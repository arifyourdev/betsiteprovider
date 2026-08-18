<?php 
require_once "admin/private/initialize.php";
$page = "contact";
include "language/define_lang.php";
$footer_socials = Sociallist::find_by_single_inquiry();
auto_detect_language();
?>
<!DOCTYPE html>
<html lang="zxx">

 <head>
   <title><?php echo $cotact_meta_title ?> </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta title="<?php echo $cotact_meta_title ?>" />
  <meta name="keywords" content="<?php echo $cotact_meta_keywords ?>">
  <!-- #description -->
  <meta name="description" content="<?php echo $cotact_meta_description ?>">

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
                <h1 class="text-white"><?php echo $contact_title ?></h1>
                
              </div>

              <div class="breadcrumb-con d-inline-block">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/"><?php echo $hdr_nav_home ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $contact_title ?></li>
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
  <!-- CONTACT HELP SECTION -->
  <section
    class="float-left w-100 position-relative contact-help-con padding-top padding-bottom main-box text-center background-navy-medium">
    <figure><img src="assets/images/right-shape.png" alt="shape" class="position-absolute right-shape"></figure>
    <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block"><?php echo $customer_support ?></span>
        
        <!-- heading title con -->
      </div>
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-4 col-md-4 d-none">
          <div class="white-box position-relative w-100">
            <figure><img src="assets/images/contact-detail-img.png" alt="icon" class="img-fluid"></figure>
            <h4 class="font-weight-bold"><?php echo $contact_details ?></h4>
            <ul class="list-unstyled p-0 text-white">
              <li>121 King Street, Melbourne <br>
                Victoria 3000 Australia</li>
            </ul>
            <!-- white box -->
          </div>
          <!-- col -->
        </div>
        <div class="col-lg-4 col-md-4 d-flex">
          <div class="white-box position-relative w-100">
            <figure><img src="assets/images/email-img.png" alt="icon" class="img-fluid"></figure>
            <h4 class="font-weight-bold"><?php echo $email_us ?></h4>
            <ul class="list-unstyled p-0 text-white">
              <li><a href="mailto:<?php echo $footer_socials->mail; ?>"><?php echo $footer_socials->mail; ?></a></li>
                </a></li>
            
            </ul>
            <!-- white box -->
          </div>
          <!-- col -->
        </div>
        <div class="col-lg-4 col-md-4 d-flex">
          <div class="white-box position-relative w-100">
            <figure><img src="assets/images/phone-img.png" alt="icon" class="img-fluid"></figure>
            <h4 class="font-weight-bold"><?php echo $call_us ?></h4>
            <ul class="list-unstyled p-0 text-white">
              <li><a href="tel:<?php echo $footer_socials->whatsapp; ?>"><?php echo $footer_socials->whatsapp; ?></a></li>
            
            </ul>
            <!-- white box -->
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- why choose us con  -->
  </section>
  <!-- CONTACT FORM SECTION-->
  <section
    class="float-left w-100 position-relative contact-form-con padding-top padding-bottom main-box background-navy-light">
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        
        <h2 class="text-white col-xl-7 mr-auto ml-auto"><?php echo $contact_title ?></h2>
        <!-- heading title con -->
      </div>
      <div class="row">
        <div class="col-xl-10 col-lg-10 mr-auto ml-auto">
          <div id="form_result" style="display:none;"></div>
          <form class="main-form text-center" method="post" id="contactpage">
            <ul class="list-unstyled p-0 float-left w-100 mb-0">
              <li>
                <input type="text" placeholder="Full Name" name="fname" id="fname">
              </li>
               
              <li>
                <input type="email" placeholder="Email Address" name="email" id="email">
              </li>
              <li>
                <input type="tel" placeholder="Phone" name="phone" id="phone">
              </li>
              <li>
                <textarea placeholder="Message" rows="6" name="msg"></textarea>
              </li>
            </ul>
            <div class="primary-button d-inline-block">
              <button type="submit" id="submit"><?php echo $submit ?> <i class="fas fa-arrow-right ml-2"></i></button>
            </div>
          </form>
          <!-- col -->
        </div>
        <!-- row -->
      </div>

      <!-- container -->
    </div>
    <!-- contact form con -->
  </section>

  
 
  <!-- FOOTER SECTION -->
  <?php include "includes/footer.php" ?>
  <!-- BACK TO TOP BUTTON -->
    <?php include "includes/script.php" ?>
</body>

 </html>