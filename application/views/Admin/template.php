
<div class="wrapper ">
      <div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo base_url("asset/admin/adminmenu/assets/img/sidebar-1.jpg")?>">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
          <a target="_blank" href="https://owwa.gov.ph/" class="simple-text logo-normal">
            OWWASPOMS
          </a>
        </div>

      <div class="sidebar-wrapper">
  <ul class="nav">
    <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin() == '') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo base_url('admin/index.php') ?>">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
      </a>
    </li>


    <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin()  == 'announcement') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo base_url("admin/announcement")?>">
        <p>Announcements</p>
      </a>
    </li>

    <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin()  == 'modstudent') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo base_url("admin/scholar")?>">
        <p>Scholar</p>
      </a>
    </li>
    <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin() == 'user') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo base_url("admin/user") ?>">
      
        <p>Users</p>
      </a>
    </li>

  
    <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin()  == 'notification') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo base_url("Admin/notification")?>">
      <?php
//  print_r($cur->count);
      ?>
       <p>Notification<span class="notif_count" style=" background-color: <?php echo (!empty($cur) && $cur->count > 0) ? '#FF2E2E' : 'transparent'; ?>">
    <?php echo (!empty($cur)) ? $cur->count : ""; ?>
</span></p>

      </a>
    </li>

    <div class="dropdown">
      <li class="nav-item  <?php echo ($this->Func_Misc->currentpage_admin() == 'reports') ? 'active' : ''; ?>" >
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reports
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li><a class="dropdown-item" href="<?php echo base_url("") ?>">Scholar List</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url("") ?>">Grant List</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url("") ?>">Graduate Scholar</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url("") ?>">Submitted Documents</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url("") ?>">Terminated Scholar</a></li>
        </ul>
      </li>
    </div>
  </ul>
</div>
</div>

      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid" Style="margin-top:0">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo"><?php echo $title;?></a>
            
              
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end"> 
              <ul class="navbar-nav"> 
              <i class="fa fa-bell-o" style="float: right;"></i>
               
    <a href="<?php echo base_url("admin/modules/notification/index.php")?>">
    <span class="badge rounded-pill badge-notification <?php echo (!empty($cur) && $cur->count > 0) ? 'bg-danger text-white' : 'bg-transparent text-gray'; ?> ">
        <?php echo (!empty($cur)) ? $cur->count : ""; ?>
    </span>
</a>
                <li class="nav-item dropdown">
                  
                  <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                    <?php echo $name;?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="<?php echo base_url("admin/modules/user/index.php?view=edit&id=".$_SESSION['USERID']."")?>">Profile</a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url("Admin/logout")?>">Log out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-md-12">
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
