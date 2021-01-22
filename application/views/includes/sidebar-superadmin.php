<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">ADMINISTRATOR</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url('superadmin/home'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Statistis</span>
          </a>
        </li>
        
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Users Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
           
            <li>
              <a href="">Users Page</a>
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