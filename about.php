<?php
require_once "admin/private/initialize.php";
$page = "about";
include "language/define_lang.php";
auto_detect_language();
$about_language = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'bd') ? 'Bengali' : 'English';
$about = About::find_by_language($about_language);
?>
<!DOCTYPE html>
<html lang="zxx">
 <head>
  <title><?php echo h($about->title) ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <meta name="title" content="<?php echo h($about->meta_title) ?>">
  <meta name="description" content="<?php echo h($about->meta_description) ?>">
  <meta name="keywords" content="<?php echo h($about->meta_keywords) ?>">

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
  <div class="sub-outer-wrapper float-left w-100 position-relative"<?php if (!empty($about->breadcrumb_image)): ?> style="background-image:url('admin/<?php echo h(str_replace('\\', '/', $about->breadcrumb_image_path())) ?>')"<?php endif; ?>>
    <!-- HEADER SECTION -->
    <?php include "includes/header.php" ?>

    <div class="clearfix"></div>
    <!-- SUB BANNER SECTION -->
    <section class="float-left w-100 position-relative sub-banner-con main-box">
      <div class="container">
        <div class="rows">
          <div class="col-lg-12 col-md-12">
            <div class="sub-inner-content-con d-flexs align-items-center justify-content-between">
              <div class="sub-banner-left-con">
                <h1 class="text-white"><?php echo h($about->breadcrumb_title) ?></h1>
             
              </div>

              <div class="breadcrumb-con d-inline-block">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/"><?php echo $hdr_nav_home ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $hdr_nav_about ?></li>
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

  <!-- ABOUT OUR COMPANY SECTION -->
  <section
    class="float-left w-100 position-relative about-our-company-con padding-top padding-bottom main-box background-navy-medium">
    <figure><img src="assets/images/right-shape.png" alt="shape" class="position-absolute right-shape"></figure>
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block">Mission &amp; Vision</span>
        <h2 class="text-white"><?php echo h($about->mv_main_title) ?></h2>
        <?php if (!empty($about->mv_description)): ?>
        <p class="text-white"><?php echo nl2br(h($about->mv_description)) ?></p>
        <?php endif; ?>
        <!-- heading title con -->
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 d-flex">
          <div class="white-box position-relative w-100">
            <figure><img src="assets/images/mission-icon1.png" alt="icon" class="img-fluid"></figure>
            <h3 class="font-weight-600"><?php echo h($about->mission_title) ?></h3>
            <p class="mb-0 text-white"><?php echo nl2br(h($about->mission_description)) ?></p>
            <!-- white box -->
          </div>
          <!-- col -->
        </div>
        <div class="col-lg-6 col-md-6 d-flex">
          <div class="white-box position-relative w-100">
            <figure><img src="assets/images/vision-icon2.png" alt="icon" class="img-fluid"></figure>
            <h3 class="font-weight-600"><?php echo h($about->vision_title) ?></h3>
            <p class="mb-0 text-white"><?php echo nl2br(h($about->vision_description)) ?></p>
            <!-- white box -->
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- empowering journy con -->
  </section>

  <!-- ABOUT COMPANY SECTION -->
  <section class="float-left w-100 position-relative support-con main-box background-navy-light">
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="support-img-con">
            <figure>
              <img src="<?php echo !empty($about->company_image) ? 'admin/' . h(str_replace('\\', '/', $about->company_image_path())) : 'assets/images/plugin-support-img.png' ?>" alt="about company image">
            </figure>
            <!-- support img con -->
          </div>
          <!-- col -->
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="support-content-con">
            <span class="d-block green-text inter-font font-weight-normal"><?php echo h($about->company_short_title) ?></span>
            <div class="heading-title-con mb-0">
              <h2 class="text-white font-weight-600"><?php echo h($about->company_main_title) ?></h2>
              <p class="text-white"><?php echo nl2br(h($about->company_description)) ?></p>
              <!-- suppot contetn con -->
            </div>
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- about company con -->
  </section>

 

 
  <!-- WHY CHOOSE US SECTION -->
  <section
    class="float-left w-100 position-relative why-choose-us-con padding-top padding-bottom main-box background-navy-dark text-center">
    <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block">Why Choose Us?</span>
        <h2 class="text-white">Great Gaming Experience Starts <br>
          With A Reliable Server.</h2>
        <!-- heading title con -->
      </div>
      <!-- carousel -->
      <div class="owl-carousel">
        <?php for ($i = 1; $i <= 4; $i++):
          $card_title = $about->{"card{$i}_title"};
          $card_desc = $about->{"card{$i}_description"};
        ?>
        <div class="item">
          <div class="white-box">
            <figure class="text-center"><img src="assets/images/choose-icon<?php echo $i ?>.png" alt="icon" class="img-fluid">
            </figure>
            <h4><?php echo h($card_title) ?></h4>
            <p class="text-white mb-0"><?php echo nl2br(h($card_desc)) ?></p>
            <!-- white box -->
          </div>
          <!-- item -->
        </div>
        <?php endfor; ?>

        <!-- owl carousel -->
      </div>
      <!-- container -->
    </div>
    <!-- features benefits con -->
  </section>

  <!-- QUESTION ANSWERS SECTION -->
  <section class="float-left w-100 position-relative faq-con padding-top padding-bottom main-box background-navy-light">
    <figure><img src="assets/images/ellipse2.png" alt="element" class="position-absolute element"></figure>
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="faq_content position-relative">
            <span class="special-text purple-text d-block">Question, Answer</span>
            <h2 class="font-weight-600">Frequently Asked Questions</h2>
            <figure class="faq-image mb-0">
              <img src="assets/images/faq-image.png" alt="image" class="img-fluid">
            </figure>
            <figure class="position-relative"><img src="assets/images/elipse.png" alt="ellipse"
                class="position-absolute ellipse"></figure>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="faq_wrapper">
            <div class="accordian-section-inner position-relative">
              <div class="accordian-inner">
                <div id="home1_accordion1">
                  <div class="accordion-card">
                    <div class="card-header" id="headingOne">
                      <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne">
                        <h5>Can I upgrade my hosting plan later?</h5>
                      </a>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                      data-parent="#home1_accordion1">
                      <div class="card-body">
                        <p class="text-size-16 text-left mb-0">Yes, you can upgrade your hosting plan at any time as
                          your website grows. Our support team can
                          help you transition to a more advanced plan seamlessly without any downtime.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-card">
                    <div class="card-header" id="headingTwo">
                      <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        <h5>Do you offer free website migration?</h5>
                      </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#home1_accordion1">
                      <div class="card-body">
                        <p class="text-size-16 text-left mb-0">Yes, you can upgrade your hosting plan at any time as
                          your website grows. Our support team can
                          help you transition to a more advanced plan seamlessly without any downtime.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-card">
                    <div class="card-header" id="headingThree">
                      <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        <h5>Why do I need web hosting?</h5>
                      </a>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                      data-parent="#home1_accordion1">
                      <div class="card-body">
                        <p class="text-size-16 text-left mb-0">Yes, you can upgrade your hosting plan at any time as
                          your website grows. Our support team can
                          help you transition to a more advanced plan seamlessly without any downtime.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-card">
                    <div class="card-header" id="headingFour">
                      <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">
                        <h5>Do you offer a money-back guarantee?</h5>
                      </a>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                      data-parent="#home1_accordion1">
                      <div class="card-body">
                        <p class="text-size-16 text-left mb-0">Yes, you can upgrade your hosting plan at any time as
                          your website grows. Our support team can
                          help you transition to a more advanced plan seamlessly without any downtime.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-card">
                    <div class="card-header" id="headingFive">
                      <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                        aria-expanded="false" aria-controls="collapseFive">
                        <h5>What kind of support do you offer?</h5>
                      </a>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                      data-parent="#home1_accordion1">
                      <div class="card-body">
                        <p class="text-size-16 text-left mb-0">Yes, you can upgrade your hosting plan at any time as
                          your website grows. Our support team can
                          help you transition to a more advanced plan seamlessly without any downtime.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- container -->
    </div>
    <!-- question answer con -->
  </section>

 

 

  <!-- FOOTER SECTION -->

   <?php include "includes/footer.php" ?>



  <?php include "includes/script.php" ?>

</body>

</html>