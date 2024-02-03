<?php 

?>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-background-color="white"
        data-image="<?php echo ("http://localhost/ci_owwaspom/assets/adminMenu/assets/img/sidebar-1.jpg")?>">
        <div class="logo">
            <a target="_blank" href="https://owwa.gov.ph/" class="simple-text logo-normal">
                OWWASPOMS
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->Func_Misc->currentpage_admin() == '') ? "active" : false;?>"
                        href="<?php echo base_url('Scholar/index') ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin() == 'announcement') ? "active" : false;?>">
                    <a class="nav-link" href="<?php echo base_url('Scholar/announcement') ?>">
                        <p>Announcements</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin() == 'studentprofile') ? "active" : false;?>">
                    <a class="nav-link" href="<?php echo base_url('Scholar/studentProfile') ?>">
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin() == 'documents') ? "active" : false;?>">
                    <a class="nav-link" href="<?php echo base_url('Scholar/documents') ?>">
                        <p>Documents</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($this->Func_Misc->currentpage_admin() == 'notification') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo base_url("Scholar/notifications")?>">
   <p>Notification        <span class="badge rounded-pill badge-notification <?php echo (!empty($cur[0]) && $cur[0]->count > 0) ? 'bg-danger text-white' : 'bg-transparent text-gray'; ?> ">
                                <?php echo (!empty($cur[0])) ? $cur[0]->count : ""; ?>
                            </span>
                    </p>

    </a>
  </li>
   
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href=""><?php echo $title;?></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <i class="fa fa-bell-o" style="float: right;"></i>
      <a class="nav-link" href="<?php echo base_url("Scholar/notifications")?>">
                            <span class="badge rounded-pill badge-notification <?php echo (!empty($cur[0]) && $cur[0]->count > 0) ? 'bg-danger text-white' : 'bg-transparent text-gray'; ?> ">
                                <?php echo (!empty($cur[0])) ? $cur[0]->count : ""; ?>
                            </span>
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                                <?php echo $name;?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item"
                                    href="scholar/modules/user/index.php?view=edit&id=<?php echo $_SESSION['USERID']; ?>">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url("Scholar/Logout") ?>">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
</div>
