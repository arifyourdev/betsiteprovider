<?php
$page = "b2b-whitelabel";
require_once "admin/private/initialize.php";
include "language/define_lang.php";
auto_detect_language();

$product_language = ($_SESSION['lang'] === 'bd') ? 'Bengali' : 'English';
$products = Product::find_by_web_type('b2b-whitelabel', $product_language);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title> <?php echo $b2b_meta_title ?> </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta title="<?php echo $b2b_meta_title ?>" />
  <meta name="keywords" content="<?php echo $b2b_meta_keywords ?>">
  <!-- #description -->
  <meta name="description" content="<?php echo $b2b_meta_description ?>">

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
                <h1 class="text-white"><?php echo $b2b_meta_title ?></h1>
                 
                <!-- sub banner left con -->
              </div>

              <div class="breadcrumb-con d-inline-block">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/"><?php echo $hdr_nav_home ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $b2b_meta_title ?></li>
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

  <!-- B2B WHITELABEL PRODUCTS SECTION -->
  <section
    class="float-left w-100 position-relative featured-games-con padding-top padding-bottom main-box background-navy-medium">
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block"><?=  $b2b_sub_title  ?></span>
        <h2 class="text-white"><?=  $b2b_meta_description ?></h2>
        <!-- heading title con -->
      </div>
      <div class="row">
        <?php if (empty($products)) { ?>
        <div class="col-12">
          <p class="text-white text-center mb-0">No products found.</p>
        </div>
        <?php } ?>
        <?php foreach ($products as $product) { ?>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="game-box w-100 position-relative">
            <figure class="position-relative zoom"><img src="admin/<?php echo str_replace('\\', '/', $product->picture_path()) ?>"
                alt="<?php echo !empty($product->image_alt) ? $product->image_alt : $product->title ?>">
            </figure>
            <div class="game-details position-absolute">
              <h4 class="text-white teko-font"><?php echo $product->title ?></h4>
              <p class="text-white mb-2"><?php echo mb_strimwidth(strip_tags($product->details), 0, 70, '...') ?></p>
              <a href="#" class="d-inline-block green-text mr-3 "><?= $read_more ?><i class="fa-solid fa-angle-right"></i></a>
             </div>
            
          </div>
          <!-- col -->
        </div>

       
        <?php } ?>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- b2b products con -->
  </section>
 
 

  <!-- FOOTER SECTION -->
<?php include "includes/footer.php" ?>
  <!-- BACK TO TOP BUTTON -->
<?php include "includes/script.php" ?>
</body>
 </html>