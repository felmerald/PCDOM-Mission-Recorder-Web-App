<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">PCDOM | LOGIN</div>
      <div class="card-body">
        <?php echo $this->session->flashdata('success'); ?>
        <?php echo form_open(base_url().'my_controller/login_authenticate') ;?>
        
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required="">
          </div>

          <div class="form-group">
            <label id="typ">Type:</label>
            <select class="form-control" name="login_type" required="">
              <option value="mrec">Mission Recorder</option>
              <option value="supply">Supply Manager</option>
              <option value="admin">Administrator</option>
            </select>
          </div>
          
          <button type="sumit" class="btn btn-primary btn-block">Login</button>
        
          
       <?php echo form_close() ;?>
        <div class="text-center">
          <a class="d-block small" href="">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>


  <!-- for footer -->
  <div class="login-footer">
    © <?php echo date('Y'); ?> Alrights Received Philippines Cagayan de Oro Mission
  </div>