<?php  
 $header_images = Header::find_by_id('1');
 $main_admin = Admin::find_by_id('1')?>
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="blog" class="header-logo">
            <img src="<?php echo $header_images->picture_path()?>" class="img-fluid rounded-normal" alt="">
            
        </a>
        <div class="iq-menu-bt-sidebar d-xl-none">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu" style="left: 24px;top: 5px;">
                <div class="main-circle"><i style="font-size:24px" class="fa">&#xf00d;</i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                 
                 <li class="<?php if ($page=='banner-English') {echo 'active active-menu';} elseif ($page=='banner-Bengali') {echo 'active active-menu';} elseif ($page=='banner') {echo 'active active-menu';}?>">
                    <a href="#dashboard3" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-2-line iq-arrow-left"></i><span>Banners </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard3" class="iq-submenu collapse <?php if ($page=='banner-English') {echo 'show';} elseif ($page=='banner-Bengali') {echo 'show';} elseif ($page=='banner') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='banner-English') {echo 'active';} ?>"><a href="banners/English"><i class="ri-book-2-line"></i>English Banner List</a></li>
                        <li class="<?php if ($page=='banner-Bengali') {echo 'active';} ?>"><a href="banners/Bengali"><i class="ri-book-2-line"></i>Bengali Banner List</a></li>
                    </ul>
                </li>
                
                <li class="<?php if ($page=='blog-English') {echo 'active active-menu';} elseif ($page=='blog-Bengali') {echo 'active active-menu';} elseif ($page=='blog') {echo 'active active-menu';}?>">
                    <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-2-line iq-arrow-left"></i><span>Blog </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='blog-English') {echo 'active';} ?>"><a href="blog/English"><i class="ri-book-2-line"></i>English Blog List</a></li>  
                        <li class="<?php if ($page=='blog-Bengali') {echo 'active';} ?>"><a href="blog/Bengali"><i class="ri-book-2-line"></i>Bengali Blog List</a></li>  
                    </ul>
                </li>

                 <li class="<?php if ($page=='home-English') {echo 'active active-menu';} elseif ($page=='home-Bengali') {echo 'active active-menu';}?>">
                    <a href="#dashboard6" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-home-4-line iq-arrow-left"></i><span>Home Page </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard6" class="iq-submenu collapse <?php if ($page=='home-English') {echo 'show';} elseif ($page=='home-Bengali') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='home-English') {echo 'active';} ?>"><a href="home/English"><i class="ri-book-2-line"></i>English Home Page</a></li>
                        <li class="<?php if ($page=='home-Bengali') {echo 'active';} ?>"><a href="home/Bengali"><i class="ri-book-2-line"></i>Bengali Home Page</a></li>
                    </ul>
                </li>

                <li class="<?php if ($page=='about-English') {echo 'active active-menu';} elseif ($page=='about-Bengali') {echo 'active active-menu';}?>">
                    <a href="#dashboard4" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-2-line iq-arrow-left"></i><span>About Us  </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard4" class="iq-submenu collapse <?php if ($page=='about-English') {echo 'show';} elseif ($page=='about-Bengali') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='about-English') {echo 'active';} ?>"><a href="about/English"><i class="ri-book-2-line"></i>English About Page</a></li>
                        <li class="<?php if ($page=='about-Bengali') {echo 'active';} ?>"><a href="about/Bengali"><i class="ri-book-2-line"></i>Bengali About Page</a></li>
                    </ul>
                </li>
                
                <li class="<?php if ($page=='payment_method-English') {echo 'active active-menu';} elseif ($page=='payment_method-Bengali') {echo 'active active-menu';}?>">
                    <a href="#dashboard5" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-2-line iq-arrow-left"></i><span>Payment Method </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard5" class="iq-submenu collapse <?php if ($page=='payment_method-English') {echo 'show';} elseif ($page=='payment_method-Bengali') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='payment_method-English') {echo 'active';} ?>"><a href="payment_method/English"><i class="ri-book-2-line"></i>English Payment Method Page</a></li>
                        <li class="<?php if ($page=='payment_method-Bengali') {echo 'active';} ?>"><a href="payment_method/Bengali"><i class="ri-book-2-line"></i>Bengali Payment Method Page</a></li>
                    </ul>
                </li>

                <li class="<?php if ($page=='product-English') {echo 'active active-menu';} elseif ($page=='product-Bengali') {echo 'active active-menu';} elseif ($page=='product') {echo 'active active-menu';}?> ">
                    <a href="#dashboard2" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-book-2-line iq-arrow-left"></i><span>Product </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard2" class="iq-submenu collapse <?php if ($page=='product-English') {echo 'show';} elseif ($page=='product-Bengali') {echo 'show';} elseif ($page=='product') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='product-English') {echo 'active';} ?>"><a href="products/English"><i class="ri-book-2-line"></i>English Product List</a></li>  
                        <li class="<?php if ($page=='product-Bengali') {echo 'active';} ?>"><a href="products/Bengali"><i class="ri-book-2-line"></i>Bengali Product List</a></li> 
                    </ul>
                </li>
                <li class="<?php if ($page=='inquiry') {echo 'active active-menu';}?>">
                    <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-admin-line"></i><span>Inquiry</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="admin" class="iq-submenu collapse <?php if ($page=='inquiry') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='inquiry') {echo 'active';} ?>"><a href="inquiry"><i class="ri-file-user-line"></i>Inquiry List</a></li> 
                    </ul>
                </li> 
                <li class="<?php if ($page=='update_image') {echo 'active active-menu';} elseif ($page=='socials') {echo 'active active-menu';} elseif ($page=='footer-English') {echo 'active active-menu';} elseif ($page=='footer-Bengali') {echo 'active active-menu';}?>">
                    <a href="#admin2" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-hdd"></i><span>Website Content</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="admin2" class="iq-submenu collapse <?php if ($page=='update_image') {echo 'show';} elseif ($page=='socials') {echo 'show';} elseif ($page=='footer-English') {echo 'show';} elseif ($page=='footer-Bengali') {echo 'show';}?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php if ($page=='update_image') {echo 'active';} ?>"><a href="update_image/1"><i class="las la-house-damage"></i>Update Website Logo</a></li>
                        <li class="<?php if ($page=='socials') {echo 'active';} ?>"><a href="update_socials/1"><i class="ri-facebook-fill"></i>Update Socials List</a></li>
                        <li class="<?php if ($page=='footer-English') {echo 'active';} ?>"><a href="footer_list/English"><i class="fa fa-commenting" aria-hidden="true"></i>  English Footer List</a></li>
                        <li class="<?php if ($page=='footer-Bengali') {echo 'active';} ?>"><a href="footer_list/Bengali"><i class="fa fa-commenting" aria-hidden="true"></i>  Bengali Footer List</a></li>  
                    </ul>
                </li> 
            </ul>
        </nav> 
    </div>
</div>