<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Create Statistics for <b><?php echo previousweek(); ?> LAST WEEK </b></li>
       
      </ol>
      <div class="row">
        <div class="col-12">
        <br/>

          

        <?php echo form_open(base_url('my_controller/addstatistics')); ?>

        <button type="submit" class="btn btn-warning">SUBMIT</button><br/>
        <br/>
        <div class="row">
        <div class="col-sm-3">
          <label>Select Week Number:</label>
          <select class="js-example-basic-multiple form-control" style="width: 100%;" name="week_number" required="">
            <option></option>
              <optgroup label="Select Week Number">



                <option value="1">Week 1</option>
                <option value="2">Week 2</option>
                <option value="3">Week 3</option>
                <option value="4">Week 4</option>
                <option value="5">Week 5</option>
              </optgroup>
            
          </select>
        </div>
      </div>
      <br/>

        <table id="basictable" class="display responsive nowrap" style="width:100%">
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
                <?php if(!empty($getcompanionship)): foreach($getcompanionship as $row): ?>
                <tr>
                  <td>
                    <input type="hidden" name="zone_id[]" value="<?php echo $row->pczone_id; ?>">
                    <?php echo ucwords($row->zone_name); ?>
                      
                    </td>
                  <td>
                    <input type="hidden" name="district_id[]" value="<?php echo $row->pcdistrict_id; ?>">
                    <?php echo ucwords($row->district_name); ?>
                      
                    </td>
                  <td>
                    <input type="hidden" name="area_id[]" value="<?php echo $row->pcarea_id; ?>">
                    <?php echo ucwords($row->area_name); ?>
                      
                    </td>
                  <td>
                    <input type="hidden" name="companionship_id[]" value="<?php echo $row->companionship_id; ?>">
                    <?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>


                   
                      
                    </td>
                  <td><input type="text" name="baptism[]" required="" class="form-control col-sm-12"></td>
                  <td><input type="text" name="confirm[]" required="" class="form-control col-sm-12"></td>
                  <td><input type="text" name="ibd[]" required="" class="form-control col-sm-12"></td>
                  <td><input type="text" name="iasm[]" required="" class="form-control col-sm-12"></td>
                  <td><input type="text" name="ni[]" required="" class="form-control col-sm-12"></td>
                  <td><input type="text" name="ph[]" required="" class="form-control col-sm-12"></td>
                  <td><input type="text" name="wh[]" class="form-control col-sm-12" ></td>
                  <td><input type="text" name="tsa[]" class="form-control col-sm-12" ></td>
                </tr>
                <?php endforeach;endif;?>
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

        <?php echo form_close(); ?>
          




        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php $this->load->view('includes/copyright'); ?>