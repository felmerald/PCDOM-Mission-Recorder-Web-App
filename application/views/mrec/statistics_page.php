<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

    <div class="btn-group">
      <a href="<?php echo base_url('mrec/create_statistics'); ?>" class="btn btn-primary">Create Statistics for <?php echo previousweek(); ?> LAST WEEK</a>
      
      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
           Previous Stats
        </button>
        <div class="dropdown-menu">
          
              
              <?php 

                for ($m=1; $m<=12; $m++):$month = date('F', mktime(0,0,0,$m, 1, date('Y'))); ?>
                <a class="dropdown-item" href="<?php echo base_url('mrec/statistics/'.strtolower($month).''); ?>">
                  <?php 
                 
                 echo $month
                 ;?>
                 </a>

              <?php endfor; ?>

          
        </div>
      </div>
    </div>


   
     
          <br/><br/>
     <h3><center><?php echo date('F Y'); ?></center></h3>









        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="week1-tab" data-toggle="tab" href="#week1" role="tab" aria-controls="week1" aria-selected="true">Week 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="week2-tab" data-toggle="tab" href="#week2" role="tab" aria-controls="week2" aria-selected="false">Week 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="week3-tab" data-toggle="tab" href="#week3" role="tab" aria-controls="week3" aria-selected="false">Week 3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="week4-tab" data-toggle="tab" href="#week4" role="tab" aria-controls="week4" aria-selected="false">Week 4</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="week5-tab" data-toggle="tab" href="#week5" role="tab" aria-controls="week5" aria-selected="false">Week 5</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="total-tab" data-toggle="tab" href="#total" role="tab" aria-controls="total" aria-selected="false">Total</a>
          </li>
        </ul>

      <div class="row">
        <div class="col-12">

     <?php echo $this->session->flashdata('success'); ?>

        <div class="tab-content" id="myTabContent">

          <!-- ===========WEEK 1 STATISTICS============== -->
          <div class="tab-pane fade show active" id="week1" role="tabpanel" aria-labelledby="week1-tab">
            <br/>

            <div class="row">
            <div class="table-responsive col-sm-6 pull-left">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>BAPTISM</th>
                    <th>CONFIRM</th>
                    <th>IBD</th>
                    <th>IASM</th>
                    <th>NI</th>
                    <th>PH</th>
                    <th>WH</th>
                    <th>DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if(!empty($stats_w1)):
                        foreach($stats_w1 as $row): ?>
                  <tr>
                    <td><CENTER><b><?php echo $row->baptism; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->confirm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ibd; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->iasm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ni; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ph; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->wh; ?></b></CENTER></td>
                    <td>
                      <a href="<?php echo base_url();?>mrec/downloadpdf" class="btn btn-danger btn-sm <?php echo empty($row->baptism) ? "disabled" : ""; ?>" data-toggle="tooltip" data-placement="bottom" title="Download Week 1 Key Indicators Report">
                        Download 
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                 
                <?php endforeach;
                  endif; ?>
                </tbody>
              </table>
            </div>
            <!-- end table -->

           



          </div>
          <div class="row">
            <div class="col-sm-12">
               <div class="btn-group btn-xs">
                  <a href="<?php echo base_url(); ?>mrec/download_summaryreport" class="btn btn-primary btn-xs">Download Summary Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_keyindicatorreport" class="btn btn-success btn-xs">Download K.I Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>my_controller/download_districtbaptismreport_week1" class="btn btn-warning btn-xs">Download District Baptism Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                
              </div>
            </div>
            </div>
          <hr/>

            <CENTER>
            <h3>PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <p class="text-primary">Kaya Yan! Cagayan!</p>
            <h5>Weekly Key Indicator Report</h5>
            <p>
                
                <?php

                    if(!empty($get_weekdate1)):
                      foreach($get_weekdate1 as $row):
                        echo $row->week_date;
                      endforeach;
                    endif;

                 ?>

            </p>
            </CENTER>

            <br/>
            <br/>
            

            <table id="weekone" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($get_statistics)): 
                        foreach($get_statistics as $row): 
                          if($row->week_number == 1):
                            if($row->month == date('F')):
                              if($row->year == date('Y')):

                  ?>
                <tr>
                  <td><?php echo ucwords($row->zone_name); ?></td>
                  <td><?php echo ucwords($row->district_name); ?></td>
                  <td><?php echo ucwords($row->area_name); ?></td>
                  <td>
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
                  </td>
                  <style type="text/css">
                    .colortxt{
                      color:red; font-weight: bold;
                    }
                    @media print {
                      .colortxt{
                      color:red !important; font-weight: bold !important;
                    }
                      -webkit-print-color-adjust: exact; 
                  }
                
                  </style>
                 
                    <td class="<?php echo $row->baptism > 0 ? 'table-danger colortxt' : ''; ?>">
                      <center><?php echo $row->baptism; ?></center>
                    </td>
                  <td class="<?php echo $row->confirm > 0 ? 'table-danger colortxt' : ''; ?>">
                    <center><?php echo $row->confirm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ibd; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->iasm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ni; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ph; ?></center>
                  </td>
                  <td><center><?php echo $row->wh; ?></center></td>
                  <td class="<?php echo empty($row->tsa) ? "table-warning" : ""; ?>">
                    <center><?php echo $row->tsa; ?></center>
                  </td>
                  <td>
                      
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editstats<?php echo $row->stats_id; ?>"><i class="fa fa-fw fa-edit"></i></button>
                 


                  </td>
                </tr>
                </tr>

                <?php   
                  endif;
                    endif;
                      endif;

                 endforeach; 
                    endif; ?>

              </tbody>
              <tfoot>
                <tr>
                   <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </tfoot>
            </table>





          </div>


          <!-- ===========WEEK 2 STATISTICS============== -->
          <div class="tab-pane fade" id="week2" role="tabpanel" aria-labelledby="week2-tab">
            <br/>
             <div class="row">
            <div class="table-responsive col-sm-6 pull-left">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>BAPTISM</th>
                    <th>CONFIRM</th>
                    <th>IBD</th>
                    <th>IASM</th>
                    <th>NI</th>
                    <th>PH</th>
                    <th>WH</th>
                    <th>DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if(!empty($stats_w2)):
                        foreach($stats_w2 as $row): ?>
                  <tr>
                    <td><CENTER><b><?php echo $row->baptism; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->confirm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ibd; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->iasm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ni; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ph; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->wh; ?></b></CENTER></td>
                    <td>
                      <a href="<?php echo base_url();?>mrec/downloadpdfweek2" class="btn btn-danger btn-sm <?php echo empty($row->baptism) ? "disabled" : ""; ?>" data-toggle="tooltip" data-placement="bottom" title="Download Week 2 Key Indicators Report">
                        Download 
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                 
                <?php endforeach;
                  endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
               <div class="btn-group btn-xs">
                  <a href="<?php echo base_url(); ?>my_controller/download_summaryreport_week2" class="btn btn-primary btn-xs">Download Summary Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_keyindicatorreport" class="btn btn-success btn-xs">Download K.I Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_districtbaptismreport" class="btn btn-warning btn-xs">Download District Baptism Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                
              </div>
            </div>
            </div>
          <hr/>
            
            <CENTER>
            <h3>PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <p class="text-primary">Kaya Yan! Cagayan!</p>
            <h5>Weekly Key Indicator Report</h5>
            <p>
               <?php

                    if(!empty($get_weekdate2)):
                      foreach($get_weekdate2 as $row):
                        echo $row->week_date;
                      endforeach;
                    endif;

                 ?>
            </p>
          </CENTER>
          <br/>
            <br/>

           


           <table id="weektwo" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($get_statistics)): 
                        foreach($get_statistics as $row): 
                          if($row->week_number == 2):
                            if($row->month == date('F')):
                              if($row->year == date('Y')):

                  ?>
                <tr>
                  <td><?php echo ucwords($row->zone_name); ?></td>
                  <td><?php echo ucwords($row->district_name); ?></td>
                  <td><?php echo ucwords($row->area_name); ?></td>
                  <td>
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
                  </td>
                  <style type="text/css">
                    .colortxt{
                      color:red; font-weight: bold;
                    }
                    @media print {
                      .colortxt{
                      color:red !important; font-weight: bold !important;
                    }
                      -webkit-print-color-adjust: exact; 
                  }
                
                  </style>
                 
                    <td class="<?php echo $row->baptism > 0 ? 'table-danger colortxt' : ''; ?>">
                      <center><?php echo $row->baptism; ?></center>
                    </td>
                  <td class="<?php echo $row->confirm > 0 ? 'table-danger colortxt' : ''; ?>">
                    <center><?php echo $row->confirm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ibd; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->iasm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ni; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ph; ?></center>
                  </td>
                  <td><center><?php echo $row->wh; ?></center></td>
                  <td class="<?php echo empty($row->tsa) ? "table-warning" : ""; ?>">
                    <center><?php echo $row->tsa; ?></center>
                  </td>
                  <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editstats<?php echo $row->stats_id; ?>"><i class="fa fa-fw fa-edit"></i></button></td>
                </tr>
                </tr>

                <?php   
                  endif;
                    endif;
                      endif;

                 endforeach; 
                    endif; ?>

              </tbody>
              <tfoot>
                <tr>
                   <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </tfoot>
            </table>


          </div>



          <!-- ===========WEEK 3 STATISTICS============== -->
          <div class="tab-pane fade" id="week3" role="tabpanel" aria-labelledby="week3-tab">
            <br/>
             <div class="row">
            <div class="table-responsive col-sm-6 pull-left">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>BAPTISM</th>
                    <th>CONFIRM</th>
                    <th>IBD</th>
                    <th>IASM</th>
                    <th>NI</th>
                    <th>PH</th>
                    <th>WH</th>
                    <th>DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if(!empty($stats_w3)):
                        foreach($stats_w3 as $row): ?>
                  <tr>
                    <td><CENTER><b><?php echo $row->baptism; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->confirm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ibd; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->iasm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ni; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ph; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->wh; ?></b></CENTER></td>
                    <td>
                      <a href="<?php echo base_url();?>mrec/downloadpdfweek3" class="btn btn-danger btn-sm <?php echo empty($row->baptism) ? "disabled" : ""; ?>" data-toggle="tooltip" data-placement="bottom" title="Download Week 3 Key Indicators Report">
                        Download 
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                 
                <?php endforeach;
                  endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
               <div class="btn-group btn-xs">
                  <a href="<?php echo base_url(); ?>my_controller/download_summaryreport_week3" class="btn btn-primary btn-xs">Download Summary Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_keyindicatorreport" class="btn btn-success btn-xs">Download K.I Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_districtbaptismreport" class="btn btn-warning btn-xs">Download District Baptism Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                
              </div>
            </div>
            </div>
          <hr/>
           
            <CENTER>
            <h3>PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <p class="text-primary">Kaya Yan! Cagayan!</p>
            <h5>Weekly Key Indicator Report</h5>
            <p>
              <?php

                    if(!empty($get_weekdate3)):
                      foreach($get_weekdate3 as $row):
                        echo $row->week_date;
                      endforeach;
                    endif;

                 ?>
            </p>
          </CENTER>

          <br/>
            <br/>

            <table id="weekthree" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($get_statistics)): 
                        foreach($get_statistics as $row): 
                          if($row->week_number == 3):
                            if($row->month == date('F')):
                              if($row->year == date('Y')):

                  ?>
                <tr>
                  <td><?php echo ucwords($row->zone_name); ?></td>
                  <td><?php echo ucwords($row->district_name); ?></td>
                  <td><?php echo ucwords($row->area_name); ?></td>
                  <td>
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
                  </td>
                  <style type="text/css">
                    .colortxt{
                      color:red; font-weight: bold;
                    }
                    @media print {
                      .colortxt{
                      color:red !important; font-weight: bold !important;
                    }
                      -webkit-print-color-adjust: exact; 
                  }
                
                  </style>
                 
                    <td class="<?php echo $row->baptism > 0 ? 'table-danger colortxt' : ''; ?>">
                      <center><?php echo $row->baptism; ?></center>
                    </td>
                  <td class="<?php echo $row->confirm > 0 ? 'table-danger colortxt' : ''; ?>">
                    <center><?php echo $row->confirm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ibd; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->iasm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ni; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ph; ?></center>
                  </td>
                  <td><center><?php echo $row->wh; ?></center></td>
                  <td class="<?php echo empty($row->tsa) ? "table-warning" : ""; ?>">
                    <center><?php echo $row->tsa; ?></center>
                  </td>
                  <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editstats<?php echo $row->stats_id; ?>"><i class="fa fa-fw fa-edit"></i></button></td>
                </tr>
                </tr>

                <?php   
                  endif;
                    endif;
                      endif;

                 endforeach; 
                    endif; ?>

              </tbody>
              <tfoot>
                <tr>
                   <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </tfoot>
            </table>



          </div>


          <!-- ===========WEEK 4 STATISTICS============== -->
          <div class="tab-pane fade" id="week4" role="tabpanel" aria-labelledby="week4-tab">
            <br/>
             <div class="row">
            <div class="table-responsive col-sm-6 pull-left">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>BAPTISM</th>
                    <th>CONFIRM</th>
                    <th>IBD</th>
                    <th>IASM</th>
                    <th>NI</th>
                    <th>PH</th>
                    <th>WH</th>
                    <th>DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if(!empty($stats_w4)):
                        foreach($stats_w4 as $row): ?>
                  <tr>
                    <td><CENTER><b><?php echo $row->baptism; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->confirm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ibd; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->iasm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ni; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ph; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->wh; ?></b></CENTER></td>
                    <td>
                      <a href="<?php echo base_url();?>mrec/downloadpdfweek4" class="btn btn-danger btn-sm <?php echo empty($row->baptism) ? "disabled" : ""; ?>" data-toggle="tooltip" data-placement="bottom" title="Download Week 4 Key Indicators Report">
                        Download 
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                 
                <?php endforeach;
                  endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
               <div class="btn-group btn-xs">
                  <a href="<?php echo base_url(); ?>my_controller/download_summaryreport_week4" class="btn btn-primary btn-xs">Download Summary Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_keyindicatorreport" class="btn btn-success btn-xs">Download K.I Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_districtbaptismreport" class="btn btn-warning btn-xs">Download District Baptism Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                
              </div>
            </div>
            </div>
          <hr/>
            
            <CENTER>
            <h3>PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <p class="text-primary">Kaya Yan! Cagayan!</p>
            <h5>Weekly Key Indicator Report</h5>
            <p>
               <?php

                    if(!empty($get_weekdate4)):
                      foreach($get_weekdate4 as $row):
                        echo $row->week_date;
                      endforeach;
                    endif;

                 ?>
            </p>
          </CENTER>

          <br/>
            <br/>

            <table id="weekfour" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($get_statistics)): 
                        foreach($get_statistics as $row): 
                          if($row->week_number == 4):
                            if($row->month == date('F')):
                              if($row->year == date('Y')):

                  ?>
                <tr>
                  <td><?php echo ucwords($row->zone_name); ?></td>
                  <td><?php echo ucwords($row->district_name); ?></td>
                  <td><?php echo ucwords($row->area_name); ?></td>
                  <td>
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
                  </td>
                  <style type="text/css">
                    .colortxt{
                      color:red; font-weight: bold;
                    }
                    @media print {
                      .colortxt{
                      color:red !important; font-weight: bold !important;
                    }
                      -webkit-print-color-adjust: exact; 
                  }
                
                  </style>
                 
                    <td class="<?php echo $row->baptism > 0 ? 'table-danger colortxt' : ''; ?>">
                      <center><?php echo $row->baptism; ?></center>
                    </td>
                  <td class="<?php echo $row->confirm > 0 ? 'table-danger colortxt' : ''; ?>">
                    <center><?php echo $row->confirm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ibd; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->iasm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ni; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ph; ?></center>
                  </td>
                  <td><center><?php echo $row->wh; ?></center></td>
                  <td class="<?php echo empty($row->tsa) ? "table-warning" : ""; ?>">
                    <center><?php echo $row->tsa; ?></center>
                  </td>
                  <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editstats<?php echo $row->stats_id; ?>"><i class="fa fa-fw fa-edit"></i></button></td>
                </tr>
                </tr>

                <?php   
                  endif;
                    endif;
                      endif;

                 endforeach; 
                    endif; ?>

              </tbody>
              <tfoot>
                <tr>
                   <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </tfoot>
            </table>



          </div>


          <!-- ===========WEEK 5 STATISTICS============== -->
          <div class="tab-pane fade" id="week5" role="tabpanel" aria-labelledby="week5-tab">
            <br/>
             <div class="row">
            <div class="table-responsive col-sm-6 pull-left">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>BAPTISM</th>
                    <th>CONFIRM</th>
                    <th>IBD</th>
                    <th>IASM</th>
                    <th>NI</th>
                    <th>PH</th>
                    <th>WH</th>
                    <th>DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if(!empty($stats_w5)):
                        foreach($stats_w5 as $row): ?>
                  <tr>
                    <td><CENTER><b><?php echo $row->baptism; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->confirm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ibd; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->iasm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ni; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ph; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->wh; ?></b></CENTER></td>
                    <td>
                      <a href="<?php echo base_url();?>mrec/downloadpdfweek5" class="btn btn-danger btn-sm <?php echo empty($row->baptism) ? "disabled" : ""; ?>" data-toggle="tooltip" data-placement="bottom" title="Download Week 5 Key Indicators Report">
                        Download 
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                 
                <?php endforeach;
                  endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
               <div class="btn-group btn-xs">
                  <a href="<?php echo base_url(); ?>my_controller/download_summaryreport_week5" class="btn btn-primary btn-xs">Download Summary Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_keyindicatorreport" class="btn btn-success btn-xs">Download K.I Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>mrec/download_districtbaptismreport" class="btn btn-warning btn-xs">Download District Baptism Report <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                
              </div>
            </div>
            </div>
          <hr/>
            
            <CENTER>
            <h3>PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <p class="text-primary">Kaya Yan! Cagayan!</p>
            <h5>Weekly Key Indicator Report</h5>
            <p>
               <?php

                    if(!empty($get_weekdate5)):
                      foreach($get_weekdate5 as $row):
                        echo $row->week_date;
                      endforeach;
                    endif;

                 ?>
            </p>
          </CENTER>

          <br/>
            <br/>

            <table id="weekfive" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($get_statistics)): 
                        foreach($get_statistics as $row): 
                          if($row->week_number == 5):
                            if($row->month == date('F')):
                              if($row->year == date('Y')):

                  ?>
                <tr>
                  <td><?php echo ucwords($row->zone_name); ?></td>
                  <td><?php echo ucwords($row->district_name); ?></td>
                  <td><?php echo ucwords($row->area_name); ?></td>
                  <td>
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
                  </td>
                  <style type="text/css">
                    .colortxt{
                      color:red; font-weight: bold;
                    }
                    @media print {
                      .colortxt{
                      color:red !important; font-weight: bold !important;
                    }
                      -webkit-print-color-adjust: exact; 
                  }
                
                  </style>
                 
                    <td class="<?php echo $row->baptism > 0 ? 'table-danger colortxt' : ''; ?>">
                      <center><?php echo $row->baptism; ?></center>
                    </td>
                  <td class="<?php echo $row->confirm > 0 ? 'table-danger colortxt' : ''; ?>">
                    <center><?php echo $row->confirm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ibd; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->iasm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ni; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ph; ?></center>
                  </td>
                  <td><center><?php echo $row->wh; ?></center></td>
                  <td class="<?php echo empty($row->tsa) ? "table-warning" : ""; ?>">
                    <center><?php echo $row->tsa; ?></center>
                  </td>
                  <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editstats<?php echo $row->stats_id; ?>"><i class="fa fa-fw fa-edit"></i></button></td>
                </tr>
                </tr>

                <?php   
                  endif;
                    endif;
                      endif;

                 endforeach; 
                    endif; ?>

              </tbody>
              <tfoot>
                <tr>
                   <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                  <th>OPTION</th>
                </tr>
              </tfoot>
            </table>


          </div>


          <!-- ===========TOTAL STATISTICS============== -->
          <div class="tab-pane fade" id="total" role="tabpanel" aria-labelledby="total-tab">
               <br/>
             <div class="row">
            <div class="table-responsive col-sm-6 pull-left">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>BAPTISM</th>
                    <th>CONFIRM</th>
                    <th>IBD</th>
                    <th>IASM</th>
                    <th>NI</th>
                    <th>PH</th>
                    <th>WH</th>
                    <th>DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php if(!empty($getmonthlyReports)):
                          foreach($getmonthlyReports as $row): ?>
                  <tr>
                    <td><CENTER><b><?php echo $row->baptism; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->confirm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ibd; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->iasm; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ni; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->ph; ?></b></CENTER></td>
                    <td><CENTER><b><?php echo $row->wh; ?></b></CENTER></td>
                    <td>
                      <a href="<?php echo base_url();?>mrec/downloadmonthlystatistics" class="btn btn-danger btn-sm <?php echo empty($row->baptism) ? "disabled" : ""; ?>" data-toggle="tooltip" data-placement="bottom" title="Download <?php echo date('M Y'); ?> Key Indicators Report">
                        Download 
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                      endforeach;
                    endif;
                   ?>
                 
                
                </tbody>
              </table>
            </div>
          </div>
          <hr/>
            
            <CENTER>
            <h3>PHILIPPINES CAGAYAN DE ORO MISSION</h3>
            <p class="text-primary">Kaya Yan! Cagayan!</p>
            <h5>Monthly Key Indicator Report</h5>
            <p><?php echo date('F Y'); ?></p>
          </CENTER>

          <br/>
            <br/>

            <table id="monthlytotal" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($get_statisticsmonthly)): foreach($get_statisticsmonthly as $row): ?>
                <tr>
                  <td><?php echo strtoupper($row->zone_name); ?></td>
                  <td><?php echo strtoupper($row->district_name); ?></td>
                  <td><?php echo strtoupper($row->area_name); ?></td>
                  <td>
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
                  </td>
                    <style type="text/css">
                    .colortxt{
                      color:red; font-weight: bold;
                    }
                    @media print {
                      .colortxt{
                      color:red !important; font-weight: bold !important;
                    }
                      -webkit-print-color-adjust: exact; 
                  }
                
                  </style>
                 
                    <td class="<?php echo $row->baptism > 0 ? 'table-danger colortxt' : ''; ?>">
                      <center>
                        <?php echo $row->baptism; ?></center>
                    </td>
                  <td class="<?php echo $row->confirm > 0 ? 'table-danger colortxt' : ''; ?>">
                    <center><?php echo $row->confirm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ibd; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->iasm; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ni; ?></center>
                  </td>
                  <td>
                    <center><?php echo $row->ph; ?></center>
                  </td>
                  <td><center><?php echo $row->wh; ?></center></td>
                  <td class="<?php echo empty($row->tsa) ? "table-warning" : ""; ?>">
                    <center><?php echo $row->tsa; ?></center>
                  </td>
                 
                </tr>
              <?php endforeach;endif; ?>
              </tbody>
              <tfoot>
                <tr>
                   <th>ZONE</th>
                  <th>DISTRICT</th>
                  <th>AREA</th>
                  <th>MISSIONARIES</th>
                  <th>B</th>
                  <th>C</th>
                  <th>IBD</th>
                  <th>IASM</th>
                  <th>NI</th>
                  <th>PH</th>
                  <th>WH</th>
                  <th>TSA</th>
                </tr>
              </tfoot>
            </table>



          </div>

        </div>




          



        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php $this->load->view('includes/copyright'); ?>




    <!-- ====================EDIT STATISTICS MODAL===================== -->

  <?php if(!empty($get_statistics)): 
                        foreach($get_statistics as $row): 
                      

                  ?>
        <!-- modal for Edit -->
  <div class="modal fade" id="editstats<?php echo $row->stats_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('my_controller/editstatistics')); ?>

        <input type="hidden" name="stats_id" value="<?php echo $row->stats_id; ?>">


        <div class="table-responsive">
          <table class="table table-bordered">
          <thead>
            <tr>
              <th>ZONE</th>
              <th>DISTRICT</th>
              <th>AREA</th>
              <th>MISSIONARIES</th>
              <th>B</th>
              <th>C</th>
              <th>IBD</th>
              <th>IASM</th>
              <th>NI</th>
              <th>PH</th>
              <th>WH</th>
              <th>TSA</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                  <td style="font-size: 0.7em;"><?php echo ucwords($row->zone_name); ?></td>
                  <td style="font-size: 0.7em;"><?php echo ucwords($row->district_name); ?></td>
                  <td style="font-size: 0.7em;"><?php echo ucwords($row->area_name); ?></td>
                  <td style="font-size: 0.7em;">
                    <?php 
                          echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                        ?>
                        
                  </td>
                  <style type="text/css">
                    .hasbaptism{
                      border-color: red;
                    }
                  </style>
                  <td><input type="text" name="baptism" value="<?php echo $row->baptism; ?>" class="form-control col-sm-12 <?php echo $row->baptism > 0 ? 'hasbaptism' : ''; ?>"></td>
                  <td><input type="text" name="confirm" value="<?php echo $row->confirm; ?>" class="form-control col-sm-12 <?php echo $row->confirm > 0 ? 'hasbaptism' : ''; ?>"></td>
                  <td><input type="text" name="ibd" value="<?php echo $row->ibd; ?>" class="form-control col-sm-12"></td>
                  <td><input type="text" name="iasm" value="<?php echo $row->iasm; ?>" class="form-control col-sm-12"></td>
                  <td><input type="text" name="ni" value="<?php echo $row->ni; ?>" class="form-control col-sm-12"></td>
                  <td><input type="text" name="ph" value="<?php echo $row->ph; ?>" class="form-control col-sm-12"></td>
                  <td><input type="text" name="wh" value="<?php echo $row->wh; ?>" class="form-control col-sm-12"></td>
                  <td><input type="text" name="tsa" value="<?php echo $row->tsa; ?>" class="form-control col-sm-12"></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>ZONE</th>
              <th>DISTRICT</th>
              <th>AREA</th>
              <th>MISSIONARIES</th>
              <th>B</th>
              <th>C</th>
              <th>IBD</th>
              <th>IASM</th>
              <th>NI</th>
              <th>PH</th>
              <th>WH</th>
              <th>TSA</th>
            </tr>
          </tfoot>
        </table>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >YES</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?php   
                endforeach; 
                    endif; ?>