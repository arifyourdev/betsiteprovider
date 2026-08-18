
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="blog" class="header-logo">
                    <img src="<?php $header_images->picture_path()?>" class="img-fluid rounded-normal" alt="">
                    <div class="logo-title">
                        <span class="text-primary text-uppercase"></span>
                    </div>
                </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h3 class="mb-0">
                    <!-- <img src="<?php // echo $header_images->favicon()?>" width="50" class="img-fluid" alt="">  -->
                    <?php echo $header_images->title?>
                </h3>
            </div>
            
            <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list"> 
                <li class="line-height pt-3">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img src="<?php echo $header_images->favicon()?>" class="img-fluid rounded-circle mr-3" alt="user">
                        <div class="caption">
                            <h6 class="mb-1 line-height"><?php echo $main_admin->username?></h6> 
                        </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                
                            <div class="d-inline-block w-100 text-center p-3">
                                <a class="bg-primary iq-sign-btn" href="logout" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
    </div>
</div>