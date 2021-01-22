 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('superadmin/home'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create User</li>
      </ol>
      <div class="row">
        <div class="col-12">
          
          <div class="row">
            <div class="col-sm-6">

              <?php echo $this->session->flashdata('success'); ?>


<?php echo form_open(base_url('my_controller/add_user')); ?>
              <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Password:</label>
                <input type="text" name="password" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="firstname" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Middle Name:</label>
                <input type="text" name="middlename" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="lastname" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Type:</label>
                <select name="login_type" required class="form-control">
                  <option></option>
                  <option value="mrec">Mission Recorder</option>
                  <option value="supply">Supply Manager</option>
                  <option value="admin">Administrator</option>
                </select>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
<?php echo form_close(); ?>



            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb">
                ACTIVE USERS
              </ol>
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Fullname</th>
                      <th>Type</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($select_user))
                    {
                      foreach($select_user as $row)
                      {
                     ?>
                    <tr>
                      <td><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></td>
                      <td><?php echo ucwords($row->lastname.', '.$row->firstname.' '.$row->middlename); ?></td>
                      <td>
                        <?php echo strtoupper($row->login_type); ?>
                      </td>
                      <td>dd</td>
                    </tr>
                  <?php }
                  }
                   ?>
                  </tbody>
                </table>


            </div>


          </div>




        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php $this->load->view('includes/copyright'); ?>
   