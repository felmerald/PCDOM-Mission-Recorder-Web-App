<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Missionary Information</li>
      </ol>
      <div class="row">
        <div class="col-12">
          
         

          
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ADD MISSIONARY</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MISSIONARIES LIST</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <!-- for Add missionaries -->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
     <?php echo $this->session->flashdata('success'); ?>
     <br/>
        <button class="add_field_button btn btn-primary btn-xs col-sm-2">ADD FIELDS</button>
        <br/>

        <?php echo form_open(base_url('my_controller/addmissionary')); ?>
        <br/>
         <button type="submit" class="btn btn-warning">GO SUBMIT </button>
         <br/>
          <div class="input_fields_wrap">

            <div class="row">
              <div class="col-sm-3">
            <div class="form-group">
              <label>Missionary:</label>
              <input type="text" name="missionaries_name[]" class="form-control" placeholder="Elder Lastname / Sister Lastname" required>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Gender:</label>
              <select name="gender[]" class="form-control" required="">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
            </div>


          </div>
        <?php echo form_close(); ?>



  </div>

  <!-- for List of Missionaries -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <br/>
        <table id="missionarylist" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>MISSIONARY</th>
                <th>Created</th>
                <th>STATUS</th>
                <th>Modified</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
         
          <?php 
            if(!empty($list_missionary))
            {
              foreach($list_missionary as $row)
              {
          ?>

            <tr>
                <td><?php echo ucwords($row->missionaries_name); ?></td>
                <td><?php echo $this->time_ago_lib->time_ago($row->created); ?></td>
                <td <?php echo $row->status == "released" ? "style='color:red'" : ''; ?>><?php echo strtoupper(!empty($row->status) ? $row->status : 'IN FIELD');  ?></td>
                <td>
                  <?php 
                      if(!empty($row->modified))
                      {
                        echo $this->time_ago_lib->time_ago($row->modified);
                      }

                   ?>
                    
                  </td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmissionarymodal<?php echo $row->missionary_id; ?>"><i class="fa fa-fw fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemissionarymodal<?php echo $row->missionary_id; ?>"><i class="fa fa-fw fa-trash"></i></button>
                </td>
                
            </tr>
          <?php }
        } ?>
            
        </tbody>
        <tfoot>
            <tr>
                 <th>MISSIONARY</th>
                <th>Created</th>
                <th>STATUS</th>
                <th>Modified</th>
                <th>Options</th>
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



<?php 
            if(!empty($list_missionary))
            {
              foreach($list_missionary as $row)
              {
          ?>
    <!-- modal for delete -->
  <div class="modal fade" id="deletemissionarymodal<?php echo $row->missionary_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REMOVE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete?</p>
        <p><strong>INFORMATION</strong></p>

        <h3><?php echo ucwords($row->missionaries_name); ?></h3>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url(); ?>my_controller/delete_missionary?id=<?php echo $row->missionary_id;?>" class="btn btn-primary">YES</a>
        
      </div>
    </div>
  </div>
</div>

<?php }
        } ?>


<?php 
            if(!empty($list_missionary))
            {
              foreach($list_missionary as $row)
              {
          ?>
<!-- modal for edit -->
<div class="modal fade" id="editmissionarymodal<?php echo $row->missionary_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('my_controller/editmissionary')); ?>
          <input type="hidden" name="missionary_id" value="<?php echo $row->missionary_id ?>">
          <div class="form-group">
            <label>MISSIONARY NAME:</label>
            <input type="text" name="missionaries_name" class="form-control" value="<?php echo ucwords($row->missionaries_name); ?>">
          </div>
            <div class="form-group">
            <label>CALLING: <em style="color:red">
              <?php
                  if($row->calling == "dl")
                  {
                    echo ucwords("District Leader");
                  }
                  else if($row->calling == "zl")
                  {
                    echo ucwords("Zone Leader");
                  }
                  else if($row->calling == "stl")
                  {
                    echo ucwords("Sister Training Leader");
                  }
                  else
                  {
                    echo "Proselyting Missionary";
                  }

               ?>

            </em></label>
            <select class="form-control" name="calling">
              <option value="<?php echo $row->calling; ?>">
                <?php
                  if($row->calling == "dl")
                  {
                    echo ucwords("District Leader");
                  }
                  else if($row->calling == "zl")
                  {
                    echo ucwords("Zone Leader");
                  }
                  else if($row->calling == "stl")
                  {
                    echo ucwords("Sister Training Leader");
                  }
                  else
                  {
                    echo "Proselyting Missionary";
                  }
                  ?>

              </option>
              <option>Proselyting Missionary</option>
              <option value="dl">District Leader</option>
              <option value="zl">Zone Leader</option>
              <option value="stl">Sister Training Leader</option>
            </select>
          </div>

          <p>
            
              <?php

                $this->db->select('district_name')
                         ->from('pcdom_missionaries')
                         ->join('pcdom_district','pcdom_district.district_id = pcdom_missionaries.district_id','left')
                         ->where('missionary_id',$row->missionary_id);
                         $query = $this->db->get();
                         foreach($query->result() as $data)
                         {
                          echo '<strong>DISTRICT:</strong> <em style="color:red;">'.$data->district_name.'</em>';
                         }


               ?>


          </p>
          <div class="form-group">
            <label>SELECT DISTRICT:</label>
            <select class="form-control" name="district_id">
              
               <?php

                $this->db->select('district_name,pcdom_missionaries.district_id AS p_district_id')
                         ->from('pcdom_missionaries')
                         ->join('pcdom_district','pcdom_district.district_id = pcdom_missionaries.district_id','left')
                         ->where('missionary_id',$row->missionary_id);
                         $query = $this->db->get();
                         foreach($query->result() as $result)
                         {
                            echo '<option value="<?php echo $row->p_district_id; ?>">'.$result->district_name.'</option>';
                         }


               ?>
               <option>No Calling</option>
              <?php
                $this->db->select('district_id, district_name')
                          ->from('pcdom_district')
                          ->order_by('district_name','ASC');
                $query = $this->db->get();
                foreach($query->result() as $row):

               ?>
              <option value="<?php echo $row->district_id; ?>"><?php echo ucwords($row->district_name); ?></option>
                <?php endforeach; ?>
            </select>
          </div>


          <p><strong>STATUS:</strong> <?php echo strtoupper(!empty($row->status) ? $row->status : 'IN FIELD');  ?></p>
          <div class="form-group">
            <label>STATUS:</label>
            <select class="form-control" name="status">
              <option></option>
              <option>IN FIELD</option>
              <option value="released">RELEASED</option>
            </select>
          </div>

       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?php }
        } ?>
   


   