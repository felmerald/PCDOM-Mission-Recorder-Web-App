<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url('mrec/home'); ?>">MISSION RECORDER</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url('mrec/home'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="<?php echo base_url('mrec/statistics'); ?>">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Statistis</span>
          </a>
        </li>
        
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cog"></i>
            <span class="nav-link-text">Settings</span>
            



          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="<?php echo base_url('mrec/create_companionship'); ?>">Create Missionaries</a>
            </li>
            <li>
              <a href="<?php echo base_url('mrec/companionship'); ?>">Create Companionship</a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#addzonemodal">Create Zone</a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#adddistrictmodal">Create District</a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#addareamodal">Create Area</a>
            </li>
            <li>
              <a href="<?php echo base_url('mrec/zones_pages'); ?>">View Zone, District, Areas</a>
            </li>
           
            <li>
              <a href="">Forgot Password Page</a>
            </li>
            
          </ul>
        </li>
        
        
      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      
         <li class="nav-item">
              <div class="nav-link">
                
                <?php

                  $this->db->select('firstname, lastname')
                  ->from('pcdom_users')
                  ->where('user_id',$this->session->userdata('login_id'));
                    $query = $this->db->get();
                    foreach($query->result() as $row)
                    {
                      echo ucwords($row->lastname.', '.$row->firstname);
                    }

                 ?>



              </div>
         </li>
      
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>my_controller/logout" class="nav-link">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>




  <!-- modals -->

  <!-- ==========================ZONE============================= -->

  <div class="modal fade" id="addzonemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD ZONE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <button class="add_field_button_zone btn btn-primary btn-xs col-sm-4">ADD FIELDS</button>
          <br/>
          <?php echo form_open(base_url('my_controller/addzone')); ?>
          <div class="input_fields_wrap_zone">
            <div class="form-group">
              <label>Zone name:</label>
              <input type="text" name="zone_name[]" class="form-control" placeholder="Name of Zone" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">ADD</button>
        <?php echo form_close(); ?>
        
      </div>
    </div>
  </div>
</div>

<!-- ==========================DISTRICT============================= -->

 <div class="modal fade" id="adddistrictmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DISTRICT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button class="add_field_button_district btn btn-primary btn-xs col-sm-4">ADD FIELDS</button>
         <?php echo form_open(base_url('my_controller/adddistrict')); ?>

          <div class="form-group">
                    <label>SELECT ZONE:</label>
                    <select class="form-control" style="width: 100%;" name="zone_id" required="" placeholder="Select Zone">
                      <option></option>
                      <optgroup label="Search Zone">
                        <?php
                            $this->db->select('zone_id, zone_name')->from('pcdom_zone'); $query = $this->db->get();
                            foreach($query->result() as $row):
                              if(!empty($query)):
                         ?>
                              <option value="<?php echo $row->zone_id; ?>"><?php echo ucwords($row->zone_name); ?></option>
                        <?php 
                      endif;
                        endforeach; ?>
                     </optgroup>
                    </select>
          </div>
          <div class="input_fields_wrap_district">
            <div class="form-group">
              <label>Zone name:</label>
              <input type="text" name="district_name[]" class="form-control" placeholder="Name of District" required>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">ADD</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>


<!-- ==========================AREA============================= -->


<div class="modal fade" id="addareamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD AREA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <button class="add_field_button_area btn btn-primary btn-xs col-sm-4">ADD FIELDS</button>
         <?php echo form_open(base_url('my_controller/addarea')); ?>

          <div class="form-group">
                    <label>District:</label>
                    <select class="form-control" style="width: 100%;" name="district_id" required="" placeholder="Select District">
                      <option></option>
                      <optgroup label="Search District">
                        <?php
                            $this->db->select('district_id, district_name')->from('pcdom_district'); $query = $this->db->get();
                            foreach($query->result() as $row):
                              if(!empty($query)):
                         ?>
                              <option value="<?php echo $row->district_id; ?>"><?php echo ucwords($row->district_name); ?></option>
                        <?php 
                      endif;
                        endforeach; ?>
                     </optgroup>
                    </select>
          </div>
          <div class="input_fields_wrap_area">
            <div class="form-group">
              <label>Area name:</label>
              <input type="text" name="area_name[]" class="form-control" placeholder="Name of Area" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">ADD</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>