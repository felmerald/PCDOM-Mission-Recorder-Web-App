<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Zones, Districts, Areas As Of <b><?php echo date('d-M-Y'); ?> </b></li>
        <li class="breadcrumb-item"></li>
      </ol>
      <div class="row">
        <div class="col-12">
          <?php echo $this->session->flashdata('success'); ?>
  
          <table id="missionarylist" class="display responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th>ZONE</th>
                <th>DISTRICT</th>
                <th>AREA</th>
                <th>OPTIONS</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($listareas)): foreach($listareas as $row): ?>
              <tr>
                <td><b><?php echo ucwords($row->zone_name);  ?></b></td>
                <td><b><?php echo ucwords($row->district_name); ?></b></td>
                <td><?php echo ucwords($row->area_name); ?></td>
                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editzone<?php echo $row->z_id; ?>"><i class="fa fa-fw fa-edit"></i></button>
                  <em style="color:red"><?php echo $row->in_used; ?></em>
                </td>
              </tr>
            <?php endforeach; endif; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>ZONE</th>
                <th>DISTRICT</th>
                <th>AREA</th>
                <th>OPTIONS</th>
              </tr>
            </tfoot>
          </table>


 <?php if(!empty($listareas)): foreach($listareas as $row): ?>
            <div class="modal fade" id="editzone<?php echo $row->z_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">MODIFY</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php echo form_open(base_url('my_controller/editzonestatus')); ?>
                <input type="hidden" value="<?php echo $row->z_id; ?>" name="zone_id">
                <h1>STATUS: <em style="color:red">
                  
                  <?php 
                    if($row->in_used == "not_used")
                    {
                      echo "NOT USED";
                    }
                    else
                    {
                      echo "USED";
                    }
                   ?>
                </em></h1>
                 <p>Is this zone is not in used for this cycle? <em style="color:red"><?php echo ucwords($row->zone_name);  ?></em></p>
                 <select name="in_used" class="form-control" required>
                 
                   <option value="used">IN USED</option>
                   <option value="not_used">NOT USED</option>
                 </select>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save changes</button>
                  <?php echo form_close(); ?>
                  
                </div>
              </div>
            </div>
          </div>
 <?php endforeach; endif; ?>
        


        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php $this->load->view('includes/copyright'); ?>