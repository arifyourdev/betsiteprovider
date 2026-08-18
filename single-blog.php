<?php
require_once "admin/private/initialize.php";
$page = "blogs";
include "language/define_lang.php";
auto_detect_language();
$footer_socials = Sociallist::find_by_single_inquiry();
// Same Blog model / uploaded blog_image as blogs.php — only the language
// filter changes, the image markup below stays identical either way.
$blog_language = ($_SESSION['lang'] === 'bd') ? 'Bengali' : 'English';
$title_url = $_GET['title_url'] ?? '';
$blog = Blog::find_by_title_url($title_url, $blog_language);

if (!$blog) {
  redirect_to('blogs.php');
}

$prev_blog = Blog::find_prev($blog->created_at, $blog_language);
$next_blog = Blog::find_next($blog->created_at, $blog_language);
$recent_blogs = Blog::find_by_recent($blog_language);
?>
<!DOCTYPE html>
<html lang="zxx">
 <head>
    <base href="<?php echo $base_url ?>">
    <title><?php echo !empty($blog->page_title) ? $blog->page_title : $blog->title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if (!empty($blog->meta_title)) { ?>
    <meta name="keywords" content="<?php echo $blog->meta_title ?>">
    <?php } ?>
    <?php if (!empty($blog->meta_detail)) { ?>
    <meta name="description" content="<?php echo $blog->meta_detail ?>">
    <?php } ?>
    <?php include "includes/head.php" ?>

</head>

<body>
    <!-- LOADER -->
    
    <div class="sub-outer-wrapper float-left w-100 position-relative">
        <!-- HEADER SECTION -->
        <?php include "includes/header.php" ?>

        <div class="clearfix"></div>
        <!-- SUB BANNER SECTION -->
        <section class="float-left w-100 position-relative sub-banner-con main-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="sub-inner-content-con d-flexs align-items-center justify-content-between">
                            <div class="sub-banner-left-con">
                                <h1 class="text-white"><?php echo $blog->title ?></h1>
                                
                                <!-- sub banner left con -->
                            </div>

                            <div class="breadcrumb-con d-inline-block">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/"><?php echo $hdr_nav_home ?></a></li>
                                    <li class="breadcrumb-item"><a href="blogs"><?php echo $hdr_nav_blog ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $blog->title ?></li>
                                </ol>
                            </div>
                            <!-- sub inner content con -->
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- banner con -->
        </section>
        <!-- banner outer wrapper -->
    </div>
    <!-- Single Blog -->
    <section class="singleblog-section blogpage-section background-navy-light" id="single">
        <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="main-box">
                        <!-- image markup is identical for English and Bengali posts, only the language filter above differs -->
                        <figure class="image1 mb-3">
                            <img src="admin/<?php echo str_replace('\\', '/', $blog->picture_path()) ?>"
                                alt="<?php echo !empty($blog->image_alt) ? $blog->image_alt : $blog->title ?>"
                                class="img-fluid" loading="lazy">
                        </figure>
                        <div class="content1">
                            <h4><?php echo $blog->title ?></h4>
                            <div class="span-fa-outer-con">
                                <i class="fa-solid fa-user"></i>
                                <span class="text-size-14 text-mr">By : <?php echo $blog->name ?></span>
                                <i class="mb-0 calendar fa-solid fa-calendar-days"></i>
                                <span class="mb-0 text-size-14"><?php echo date('M d, Y', strtotime($blog->created_at)) ?></span>
                            </div>
                            <div class="text-size-14 blog-details-content"><?php echo $blog->details ?></div>
                        </div>
                        
                        <div class="buttons">
                            <?php if ($prev_blog) { ?>
                            <a href="blog/<?php echo $prev_blog->title_url ?>" class="prev">
                                <span class="prev-text">Prev</span>
                            </a>
                            <?php } ?>
                            <?php if ($next_blog) { ?>
                            <a href="blog/<?php echo $next_blog->title_url ?>" class="next">
                                <span class="next-text">Next</span>
                            </a>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 column">
                    
                    <div class="box1 box3">
                        <h5>Follow Us</h5>
                        <div class="social-icons">
                            <ul class="mb-0 list-unstyled ">
                                <li><a href="<?php echo $footer_socials->linkedin; ?>" class="text-decoration-none"><i
                                            class="fa-brands fa-linkedin-in social-networks"></i></a>
                                </li>
                                <li><a href="<?php echo $footer_socials->instagram; ?>" class="text-decoration-none"><i
                                            class="fa-brands fa-instagram social-networks"></i></a></li>
                                <li><a href="<?php echo $footer_socials->facebook; ?>" class="text-decoration-none"><i
                                            class="fa-brands fa-facebook-f social-networks"></i></a>
                                </li>
                                <li><a href="<?php echo $footer_socials->twitter; ?>" class="text-decoration-none"><i
                                            class="fa-brands fa-x-twitter social-networks"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="box1 box5">
                        <h5>Latest Blogs</h5>
                        <?php foreach ($recent_blogs as $i => $feed_blog) { ?>
                        <!-- image markup is identical for English and Bengali posts -->
                        <div class="feed<?php echo $i === array_key_last($recent_blogs) ? ' feed4' : '' ?>">
                            <figure class="feed-image mb-0">
                                <img src="admin/<?php echo str_replace('\\', '/', $feed_blog->picture_path()) ?>"
                                    alt="<?php echo !empty($feed_blog->image_alt) ? $feed_blog->image_alt : $feed_blog->title ?>"
                                    class="img-fluid" loading="lazy">
                            </figure>
                            <a href="blog/<?php echo $feed_blog->title_url ?>" class="mb-0"><?php echo $feed_blog->title ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA SECTION 02 -->
    <section class="float-left w-100 cta-con2 position-relative main-box background-blue">
        <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-white mb-0">Customizable Game Hosting Solutions</h2>
                <div class="primary-button d-inline-block">
                    <a href="games.html" class="d-inline-block">Explore Game Servers<i
                            class="fas fa-arrow-right ml-2"></i></a>
                </div>

            </div>

            <!-- container -->
        </div>
        <!-- cta con 2 -->
    </section>

    <!-- FOOTER SECTION -->
    <?php include "includes/footer.php" ?>
    <?php include "includes/script.php" ?>
    
</body>
 </html>