<?php
require_once "admin/private/initialize.php";
$page = "payment-methods";
include "language/define_lang.php";
auto_detect_language();
$payment_method_language = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'bd') ? 'Bengali' : 'English';
$payment_method = PaymentMethod::find_by_language($payment_method_language);
?>
<!DOCTYPE html>
<html lang="zxx">

 <head>
   <title><?php echo !empty($payment_method->meta_title) ? h($payment_method->meta_title) : $hdr_nav_payment ?> </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta title="<?php echo !empty($payment_method->meta_title) ? h($payment_method->meta_title) : $hdr_nav_payment ?>" />
  <meta name="keywords" content="<?php echo h($payment_method->meta_keywords) ?>">
  <!-- #description -->
  <meta name="description" content="<?php echo h($payment_method->meta_description) ?>">

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
  <div class="sub-outer-wrapper float-left w-100 position-relative"<?php if (!empty($payment_method->breadcrumb_image)): ?> style="background-image:url('admin/<?php echo h(str_replace('\\', '/', $payment_method->image_path('breadcrumb_image'))) ?>')"<?php endif; ?>>
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
                <h1 class="text-white"><?php echo !empty($payment_method->breadcrumb_name) ? h($payment_method->breadcrumb_name) : $hdr_nav_payment ?></h1>

              </div>

              <div class="breadcrumb-con d-inline-block">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/"><?php echo $hdr_nav_home ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $hdr_nav_payment ?></li>
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

  <!-- ABOUT SECTION -->
  <section
    class="float-left w-100 position-relative about-our-company-con payment-method-con padding-top padding-bottom main-box background-navy-medium text-center">
    <figure><img src="assets/images/right-shape.png" alt="shape" class="position-absolute right-shape"></figure>
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block"><?php echo h($payment_method->about_short_title) ?></span>
        <h2 class="text-white"><?php echo h($payment_method->about_title) ?></h2>
        <?php if (!empty($payment_method->about_description)): ?>
        <p class="text-white"><?php echo nl2br(h($payment_method->about_description)) ?></p>
        <?php endif; ?>
        <!-- heading title con -->y
      </div>
      <div class="row payment-row-card-list justify-content-center">
        <?php for ($i = 1; $i <= 4; $i++):
          $card_image = $payment_method->{"card{$i}_image"};
          $card_title = $payment_method->{"card{$i}_title"};
          $card_desc = $payment_method->{"card{$i}_description"};
        ?>
        <div class="col-lg-6 d-flex">
          <div class="payment-row-card d-flex align-items-center w-100 text-left wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo 0.15 * $i ?>s">
            <div class="payment-row-card-icon flex-shrink-0">
              <img src="<?php echo !empty($card_image) ? 'admin/' . h(str_replace('\\', '/', $payment_method->image_path("card{$i}_image"))) : 'assets/images/choose-icon' . $i . '.png' ?>" alt="<?php echo h($card_title) ?>">
            </div>
            <div class="payment-row-card-body">
              <h4 class="font-weight-bold"><?php echo h($card_title) ?></h4>
              <p class="mb-0 text-white"><?php echo nl2br(h($card_desc)) ?></p>
            </div>
            <!-- payment row card -->
          </div>
        </div>
        <?php endfor; ?>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- about con -->
  </section>

 
   <section
    class="float-left w-100 position-relative about-our-company-con padding-top padding-bottom main-box background-navy-medium">
    <figure><img src="assets/images/right-shape.png" alt="shape" class="position-absolute right-shape"></figure>
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block"><?php echo h($payment_method->getstarted_short_title) ?></span>
        <h2 class="text-white"><?php echo h($payment_method->getstarted_title) ?></h2>
        <!-- heading title con -->
          <?php if (!empty($payment_method->getstarted_description)): ?>
        <p class="text-white mb-0"><?php echo nl2br(h($payment_method->getstarted_description)) ?></p>
        <?php endif; ?>
         <div class="primary-button d-inline-block mt-4">
          <a href="contact" class="d-flex align-items-center text-center justify-content-center">
            <?php echo !empty($submit) ? $submit : 'Contact Us Today' ?>
            <span class="payment-cta-btn-icon"><i class="fas fa-arrow-right"></i></span>
          </a>
        </div>
      </div>
      
    </div>
    <!-- empowering journy con -->
  </section>

  

  <!-- FOOTER SECTION -->
  <?php include "includes/footer.php" ?>
  <!-- BACK TO TOP BUTTON -->
    <?php include "includes/script.php" ?>
</body>

 </html>
 
    <?php include "includes/script.php" ?>
</body>

 </html>