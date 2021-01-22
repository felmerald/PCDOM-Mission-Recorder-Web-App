<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Companionship As Of <b><?php echo date('d-M-Y'); ?> </b></li>
        <li class="breadcrumb-item"></li>
      </ol>
      <p>Note: Always Create Companionship Every Transfer Day</p>

      <div class="row">
        <div class="col-12">
        
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ADD COMPANIONSHIP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">COMPANIONSHIP LIST</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">

          <!-- fields -->
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             <?php echo $this->session->flashdata('success'); ?>
              <br/>
             
              
              <?php echo form_open(base_url('my_controller/addcompanionship')); ?>
              <button type="submit" class="btn btn-warning">GO SUBMIT </button>
              <br/><br/>

              <div class="input_fields_wrap">

                <div class="row">



                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Companion 1:</label>
                    <select class="js-example-basic-multiple  form-control" style="width: 100%;" name="missionary_one_id[]" required="">
                      <option></option>
                      <optgroup label="Search missionary">
                          <?php 
                          if(!empty($list_missionary))
                          { 
                            foreach($list_missionary as $row)
                            {
                          ?>
                              <option value="<?php echo $row->missionary_id; ?>"><?php echo ucwords($row->missionaries_name); ?></option>
                          <?php
                            }
                           } ?>
                     </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Companion 2:</label>
                    <select class="js-example-basic-multiple form-control" style="width: 100%;" name="missionary_two_id[]" required="">
                      <option></option>
                       <optgroup label="Search missionary">
                          <?php 
                          if(!empty($list_missionary))
                          { 
                            foreach($list_missionary as $row)
                            {
                          ?>
                              <option value="<?php echo $row->missionary_id; ?>"><?php echo ucwords($row->missionaries_name); ?></option>
                          <?php
                            }
                           } ?>
                        </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Companion 3: (Optional if Threesome)</label>
                    <select class="js-example-basic-multiple form-control" style="width: 100%;" name="missionary_three_id[]">
                      <option></option>
                       <optgroup label="Search missionary">
                          <?php 
                          if(!empty($list_missionary))
                          { 
                            foreach($list_missionary as $row)
                            {
                          ?>
                              <option value="<?php echo $row->missionary_id; ?>"><?php echo ucwords($row->missionaries_name); ?></option>
                          <?php
                            }
                           } ?>
                        </optgroup>
                    </select>
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Zone:</label>
                    <select class="js-example-basic-multiple form-control" style="width: 100%;" name="zone_id[]" required="">
                      <option></option>
                      <optgroup label="Search Zone">
                        <?php if(!empty($list_zone)): foreach($list_zone as $row): ?>
                        <option value="<?php echo $row->zone_id; ?>"><?php echo ucwords($row->zone_name); ?></option>
                      <?php endforeach; endif; ?>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>District:</label>
                    <select class="js-example-basic-multiple form-control" style="width: 100%;" name="district_id[]" required="">
                      <option></option>
                      <optgroup label="Search Zone">
                        <?php if(!empty($list_district)): foreach($list_district as $row): ?>
                        <option value="<?php echo $row->district_id; ?>"><?php echo ucwords($row->district_name); ?></option>
                      <?php endforeach; endif; ?>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Area:</label>
                    <select class="js-example-basic-multiple form-control" style="width: 100%;" name="area_id[]" required="">
                      <option></option>
                      <optgroup label="Search Zone">
                        <?php if(!empty($list_area)): foreach($list_area as $row): ?>
                        <option value="<?php echo $row->area_id; ?>"><?php echo ucwords($row->area_name); ?></option>
                      <?php endforeach; endif; ?>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Assignment:</label>
                    <select class="js-example-basic-multiple form-control" style="width: 100%;" name="assignment[]" required="">
                      <option></option>
                      <optgroup label="Search Calling">
                        <option value="regular">Regular (Or Just A Senior)</option>
                        <option value="zl">Zone Leader</option>
                        <option value="stl">Sister Training Leader</option>
                        <option value="ap">Assistand to the President</option>
                        <option value="mrec">Mission Recorder</option>
                        <option value="supply">Supply Manager</option>
                        <option value="fsec">Finance Secretary</option>
                        <option value="psec">Presidents Secretary</option>
                        <option value="dl">District Leader</option>
                      </optgroup>
                    </select>
                  </div>
                </div>









           
               <?php echo form_close(); ?>

               <div class="col-sm-12">
                 <div class="jumbotron">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>TOTAL COMPANIONSHIP AS OF <?php echo strtoupper(date('F Y')); ?></th>
                          <th>TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo strtoupper(date('F Y')); ?> TOTAL MISSIONARIES</td>
                          <td style="color:red;font-weight: bold;">
                          
                               <?php echo !empty($getcurrent_totalmissionaries) ? $getcurrent_totalmissionaries : ''; ?>

                          </td>
                        </tr>
                        <tr>
                          <td><?php echo strtoupper(date('F Y')); ?> TOTAL COMPANIONSHIP</td>
                          <td style="color:red;font-weight: bold;">
                            <?php echo !empty($getcurrent_totalcompanionship) ? $getcurrent_totalcompanionship : ''; ?>
                          </td>
                        </tr>
                        
                      </tbody>
                      </table>
                    </div>
                    


                 </div>
              </div>
                




                </div>
                <!-- end of row -->


              </div>



          </div>




          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <center><h4>TRANSFER BOARD FOR <?php echo strtoupper(date('F Y')); ?></h4></center>

  <?php echo form_open(base_url('my_controller/editcompanionship')); ?>


              <button type="submit" class="btn btn-primary">UPDATE</button><br/>
                <br/>
                <table id="basictable" class="display responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>ZONE</th>
                      <th>AREA</th>
                      <th>COMPANION 1</th>
                      <th>COMPANION 2</th>
                      <th>COMPANION 3</th>
                    </tr>
                  </thead>
                  <tbody>
           
                    <?php if(!empty($get_companionship_current)): foreach($get_companionship_current as $row): 
                        
                      ?>
                      <input type="hidden" name="companionship_id[]" value="<?php echo $row->companionship_id; ?>">
                    <tr>
                      <td><?php echo ucwords($row->zone_name); ?></td>
                      <td><?php echo ucwords($row->area_name); ?></td>
                      <td>

                        <select class="js-example-basic-multiple form-control" style="width: 100%;" name="missionary_one_id[]">
                          <option><?php echo ucwords($row->m1_missionary); ?></option>
                          <optgroup label="Search Missionary">
                             <?php 
                              if(!empty($list_missionary))
                              { 
                                foreach($list_missionary as $data)
                                {
                              ?>
                                  <option value="<?php echo $data->missionary_id; ?>"><?php echo ucwords($data->missionaries_name); ?></option>
                              <?php
                                }
                               } ?>

                          </optgroup>
                        </select>

                      </td>
                      <td>
                        <select class="js-example-basic-multiple form-control" style="width: 100%;" name="missionary_two_id[]">
                          <option><?php echo ucwords($row->m2_missionary); ?></option>
                          <optgroup label="Search Missionary">
                             <?php 
                              if(!empty($list_missionary))
                              { 
                                foreach($list_missionary as $data1)
                                {
                              ?>
                                  <option value="<?php echo $data1->missionary_id; ?>"><?php echo ucwords($data1->missionaries_name); ?></option>
                              <?php
                                }
                               } ?>

                          </optgroup>
                        </select>
                      </td>
                      <td>
                        <select class="js-example-basic-multiple form-control" style="width: 100%;" name="missionary_three_id[]">
                          <option><?php echo ucwords($row->m3_missionary); ?></option>
                          <optgroup label="Search Missionary">
                             <?php 
                              if(!empty($list_missionary))
                              { 
                                foreach($list_missionary as $data2)
                                {
                              ?>
                                  <option value="<?php echo $data2->missionary_id; ?>"><?php echo ucwords($data2->missionaries_name); ?></option>
                              <?php
                                }
                               } ?>

                          </optgroup>
                        </select>
                      </td>
                    </tr>
                    <?php  endforeach; endif; ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ZONE</th>
                      <th>AREA</th>
                      <th>COMPANION 1</th>
                      <th>COMPANION 2</th>
                      <th>COMPANION 3</th>
                    </tr>
                    
                  </tfoot>
                </table>
                
<?php echo form_close(); ?>

          </div>

        </div>
          




        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php $this->load->view('includes/copyright'); ?>