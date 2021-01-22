 <style type="text/css">
   .card-body{
  background-color: #343a40 !important;
    color: #ffffff !important;
    text-align: center;
}
 </style>
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Statistics As Of <b><?php echo date('d-M-Y'); ?> </b></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>mrec/downloadkeyindicators"><i class="fa fa-fw fa-print"></i> Print</a></li>
      </ol>
      <div class="row">
        <div class="col-12">

            <h3 style="text-align: center;">PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <h5 style="text-align: center;">KEY INDICATORS AS PER AVERAGE</h5>
            <p style="text-align: center;"><?php echo date('d F Y'); ?></p>
            <br/>

          <div class="row">
          <canvas id="barChart" width="400" height="100" style="margin-bottom: 15px"></canvas>
            <!-- <canvas id="oilChart" width="300" height="100" style="margin-bottom: 30px;"></canvas> -->




         <?php if(!empty($getmonthlyReports)): foreach($getmonthlyReports as $row): ?>
           <div class="col-sm-2">
              <div class="card">
                 <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>BAPTISM</Center></div>
                <div class="card-body">
                 
                  <h1 class="card-text"><?php echo $row->baptism; ?></h1>
                </div>
              </div>
           </div>

           <div class="col-sm-2">
              <div class="card">
                 <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>CONFIRM</Center></div>
                <div class="card-body">
                 
                  <h1 class="card-text"><?php echo $row->confirm; ?></h1>
                </div>
              </div>
           </div>


           <div class="col-sm-2">
              <div class="card">
                 <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>IBD</Center></div>
                <div class="card-body">
                 
                  <h1 class="card-text"><?php echo $row->ibd; ?></h1>
                </div>
              </div>
           </div>

           <div class="col-sm-2">
              <div class="card">
                 <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>IASM</Center></div>
                <div class="card-body">
                 
                  <h1 class="card-text"><?php echo $row->iasm; ?></h1>
                </div>
              </div>
           </div>

           <div class="col-sm-2">
              <div class="card">
                 <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>NI</Center></div>
                <div class="card-body">
                 
                  <h1 class="card-text"><?php echo $row->ni; ?></h1>
                </div>
              </div>
           </div>

           <div class="col-sm-2">
              <div class="card">
                 <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>PH</Center></div>
                <div class="card-body">
                 
                  <h1 class="card-text"><?php echo $row->ph; ?></h1>
                </div>
              </div>
           </div>          

         <?php endforeach; endif; ?>
         <!-- <div class="col-sm-12">
          <hr/>
          <h3 style="text-align: center;">PHILIPPINES CAGAYAN DE ORO MISSION</h3>
          <h5 style="text-align: center;">STATISTICS AS PER AVERAGE</h5>
          <p style="text-align: center;"><?php echo date('d F Y'); ?></p>
          <br/>
          
          <canvas id="barChart" width="400" height="100"></canvas>
         </div> -->

           <div class="col-sm-12">
            <br/>
             <ol class="breadcrumb">
          <li class="breadcrumb-item active">Baptism Comparison As Of <b><?php echo date('d-M-Y'); ?> </b></li>
          <li class="breadcrumb-item"><i class="fa fa-fw fa-print"></i> Print</li>
        </ol>
           </div>

          

           <div class="col-sm-4">
            <div class="card">
              <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>ZONE BAPTISM</Center></div>
              <div class="card-body">
          
            
                <?php if(!empty($getzonebaptism)): foreach($getzonebaptism as $row): ?>
                <div style="margin-bottom:5px;">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $row->confirm; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $row->confirm; ?></div>
                    <p style="color:black"> <?php echo ucwords($row->zone_name); ?></p>
                  </div>
                </div>
              <?php endforeach; endif; ?>

             








            </div>
           </div>
         </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>MISSIONARY BAPTISM COMPARISON</Center></div>
              <div class="card-body">
                <?php if(!empty($countelder)):foreach($countelder as $data): ?>
                  <?php
                     $this->db->select('companionship_id')
                      ->from('pcdom_companionship')
                      ->join('pcdom_missionaries','pcdom_missionaries.missionary_id = pcdom_companionship.missionary_one_id','left')
                      ->where('pcdom_missionaries.gender','male');
                      $counteldercomp = $this->db->count_all_results();

                   ?>
                <h5 style="text-align: center;"><?php echo $data->confirm; ?> TOTAL & AVERAGE IS <?php echo round($data->confirm/$counteldercomp,2); ?></h5>
                <?php  endforeach; endif; ?>
                <p class="card-text">Elders Missionary</p>
                <hr/>
                <?php if(!empty($countsister)): foreach($countsister as $row): ?>

                  <?php
                      $this->db->select('companionship_id')
                      ->from('pcdom_companionship')
                      ->join('pcdom_missionaries','pcdom_missionaries.missionary_id = pcdom_companionship.missionary_one_id','left')
                      ->where('pcdom_missionaries.gender','female');
                      $countsistercomp = $this->db->count_all_results();

                     

                   ?>



                <h5 style="text-align: center;"><?php echo $row->confirm; ?> TOTAL & AVERAGE IS <?php echo round($row->confirm/$countsistercomp,2); ?>  </h5>
                <?php  endforeach; endif; ?>
                <p class="card-text">Sisters Missionary</p>
            </div>
           </div>
         </div>

        
          <div class="col-sm-4">
            <div class="card">
              <div class="card-title" style="margin-bottom: .5rem;margin-top: .5rem;"><Center>BAPTISM PER DISTRICT</Center></div>
              <div class="card-body">
                <p><em>Zone / District</em></p>
                 <?php if(!empty($baptismperdistrict)): foreach($baptismperdistrict as $result): ?>
                <div style="margin-bottom:5px;">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:<?php echo $result->confirm; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $result->confirm; ?></div>
                    <p style="color:black"> <?php echo ucwords($result->zone_name).' / '.ucwords($result->district_name); ?></p>
                  </div>
                </div>
                  <?php endforeach; endif; ?>
            </div>
           </div>
         </div>
     




        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php $this->load->view('includes/copyright'); ?>
   