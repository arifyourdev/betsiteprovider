<?php
require_once "admin/private/initialize.php";
$page = "blogs";
include "language/define_lang.php";
auto_detect_language();

$blog_language = ($_SESSION['lang'] === 'bd') ? 'Bengali' : 'English';
$blogs = ($blog_language === 'Bengali') ? Blog::find_by_bng_language() : Blog::find_by_eng_language();
?>
<!DOCTYPE html>
<html lang="zxx">
 <head>
  <title><?php echo $blog_meta_title ?> </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta title="<?php echo $blog_meta_title ?>" />
  <meta name="keywords" content="<?php echo $blog_meta_keywords ?>">
  <!-- #description -->
  <meta name="description" content="<?php echo $blog_meta_description ?>">

  <?php include "includes/head.php" ?>

</head>

<body>
  <!-- LOADER -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
      <div></div>
    </div>
  </div>
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
                <h1 class="text-white">Latest News</h1>
               </div>

              <div class="breadcrumb-con d-inline-block">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blog</li>
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

  <!-- ARTICLES AND TIPS SECTION -->
  <section
    class="float-left w-100 articles-and-tips-con position-relative padding-top padding-bottom main-box background-navy-light tips-news-con">
    <figure><img src="assets/images/element6.png" alt="ellipse" class="position-absolute element6"></figure>
    <figure><img src="assets/images/element7.png" alt="ellipse" class="position-absolute element7"></figure>
    <figure><img src="assets/images/element8.png" alt="ellipse" class="position-absolute element8"></figure>
    <figure><img src="assets/images/element9.png" alt="ellipse" class="position-absolute element9"></figure>
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block">Gaming Insights & Resources</span>
        <h2 class="text-white">Tips, Guides, And Updates For <br>
          Your Gaming Experience. </h2>
        <!-- heading title con -->
      </div>
      <div class="row">
        <?php if (empty($blogs)) { ?>
        <div class="col-12">
          <p class="text-white text-center mb-0">No blog posts found.</p>
        </div>
        <?php } ?>
        <?php foreach ($blogs as $blog) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="article-box position-relative">
            <!-- image markup is identical for English and Bengali posts, only the query above differs -->
            <figure><img src="admin/<?php echo str_replace('\\', '/', $blog->picture_path()) ?>"
                alt="<?php echo !empty($blog->image_alt) ? $blog->image_alt : $blog->title ?>" class="img-fluid">
            </figure>
            <div class="article-white-box">
              <span class="d-block green-text inter-font"><i class="fa-regular fa-calendar-days mr-1"></i><?php echo date('M d, Y', strtotime($blog->created_at)) ?></span>
              <a href="blog/<?php echo $blog->title_url ?>">
                <h4><?php echo $blog->title ?></h4>
              </a>
              <p><?php echo mb_strimwidth(strip_tags($blog->details), 0, 100, '...') ?></p>
              <a href="blog/<?php echo $blog->title_url ?>" class="d-inline-block green-text">Read More <i
                  class="fa-solid fa-angle-right"></i> </a>
              <!-- article white box -->
            </div>
            <!-- article box -->
          </div>
          <!-- col -->
        </div>
        <?php } ?>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- articles and tips con -->
  </section>
 

  <!-- FOOTER SECTION -->
    <?php include "includes/footer.php" ?>
  <?php include "includes/script.php" ?>
</body>

 </html>