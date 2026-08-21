<?php require_once "admin/private/initialize.php";
$page = 'home';
include "language/define_lang.php";
auto_detect_language();

// HERO BANNER - pulled from admin > Banners, filtered by the currently
// selected site language. The most recently created active banner is used.
$current_lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'bd') ? 'bd' : 'en';
$hero_banners = ($current_lang == 'bd') ? Banner::find_by_bng_language() : Banner::find_by_eng_language();
$hero_banner = !empty($hero_banners) ? $hero_banners[0] : false;

// HOME PAGE CONTENT (meta, About Us section, FAQ section) - pulled from
// admin > Home Page, filtered by the currently selected site language.
$home_language = ($current_lang == 'bd') ? 'Bengali' : 'English';
$home = Home::find_by_language($home_language);
if ($home) {
  $home_meta_title = $home->meta_title;
  $home_meta_description = $home->meta_description;
  $home_meta_keywords = $home->meta_keywords;
}

// HOME PAGE PRODUCTS - latest 3 products for the current language.
$home_products = array_slice(($current_lang == 'bd') ? Product::find_by_bng_language() : Product::find_by_eng_language(), 0, 3);

// HOME PAGE BLOG - latest 3 blog posts for the current language (shown before the FAQ section).
$home_blogs = Blog::find_by_recent($home_language);


$about_language = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'bd') ? 'Bengali' : 'English';
$about = About::find_by_language($about_language);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title><?php echo $home_meta_title ?> </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta title="<?php echo $home_meta_title ?>" />
  <meta name="keywords" content="<?php echo $home_meta_keywords ?>">
  <!-- #description -->
  <meta name="description" content="<?php echo $home_meta_description ?>">
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
  <div class="banner-outer-wrapper float-left w-100 position-relative" <?php if ($hero_banner && !empty($hero_banner->image)) { ?> style="background-image: url('admin/<?php echo str_replace('\\', '/', $hero_banner->picture_path()) ?>')" <?php } ?>>
    <figure><img src="assets/images/element2.png" alt="ellipse" class="position-absolute element2"></figure>
    <figure><img src="assets/images/element5.png" alt="ellipse" class="position-absolute element5"></figure>
    <figure><img src="assets/images/element1.png" alt="ellipse" class="position-absolute element1"></figure>
    <figure><img src="assets/images/element4.png" alt="ellipse" class="position-absolute element4"></figure>
    <figure><img src="assets/images/element3.png" alt="ellipse" class="position-absolute element3"></figure>
    <!-- HEADER SECTION -->
    <?php include "includes/header.php" ?>

    <div class="clearfix"></div>
    <!-- BANNER SECTION -->
    <section class="float-left w-100 position-relative banner-con main-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="banner-content-con text-center position-relative z-index-1">
              <div class="circle">
                <div class="banner-inner-content z-index-1 position-relative">
                  <?php if ($hero_banner) { ?>
                    <span class="d-block text-white inter-font font-weight-bold"><i
                        class="fa-solid fa-rocket"></i><?php echo htmlspecialchars($hero_banner->shor_title) ?></span>
                    <h1 class="text-white text-uppercase"><?php echo htmlspecialchars($hero_banner->title) ?></h1>
                    <p class="text-white text-size-18"><?php echo htmlspecialchars($hero_banner->short_desc) ?></p>
                    <div class="secondary-button d-inline-block">
                      <a href="contact" class="d-inline-block"><?php echo htmlspecialchars($hero_banner->cta_title) ?> <i
                          class="fas fa-arrow-right ml-2"></i>
                      </a>
                    </div>
                  <?php } else { ?>
                    <span class="d-block text-white inter-font font-weight-bold"><i
                        class="fa-solid fa-rocket"></i>Connect,
                      Compete, Conquer</span>
                    <h1 class="text-white text-uppercase">Seamless Hosting <br>
                      Endless <span class="d-inline-block green-text mb-0">Gaming</span></h1>
                    <p class="text-white text-size-18">Lag-free, powerful servers designed to give you the <br>
                      ultimate gaming experience.</p>
                    <div class="secondary-button d-inline-block">
                      <a href="contact" class="d-inline-block">Browse Game Servers <i
                          class="fas fa-arrow-right ml-2"></i>
                      </a>
                    </div>
                  <?php } ?>
                  <!-- banner inner content -->
                </div>
                <!-- circle -->
              </div>
              <ul class="list-unstyled p-0 mb-0 social-con">
                <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                </li>
                <li><a href="https://twitter.com/"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a></li>
                <li class="mb-0"><a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"
                      aria-hidden="true"></i></a></li>
              </ul>
              <!-- banner content con -->
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


  <section class="float-left w-100 position-relative support-con main-box background-navy-light">
    <figure><img src="assets/images/element10.png" alt="ellipse" class="position-absolute element10"></figure>
    <figure><img src="assets/images/element7.png" alt="ellipse" class="position-absolute element7"></figure>
    <figure><img src="assets/images/element9.png" alt="ellipse" class="position-absolute element9"></figure>
    <figure><img src="assets/images/element3.png" alt="ellipse" class="position-absolute element3"></figure>
    <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: fadeInUp;">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="support-img-con">
            <!-- <figure>
              <img src="assets/images/plugin-support-img.png" alt="support image">
              
            </figure> -->
             <figure>
              <img src="<?php echo !empty($home->how_image) ? 'admin/' . str_replace('\\', '/', $home->image_path('how_image')) : 'assets/images/plugin-support-img.png' ?>" alt="how it work image">
            </figure>
            <!-- support img con -->
          </div>
          <!-- col -->
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="support-content-con">
            <span class="d-block green-text inter-font font-weight-normal"><i class="fa-solid fa-rocket"></i><?php echo $home->how_short_title ?></span>
            <div class="heading-title-con mb-0">
              <h2 class="text-white font-weight-600"><?php echo htmlspecialchars($home->how_title) ?></h2>
               <?php if (!empty($home->how_description)) { ?>
                <p class="text-white font-size-16"><?php echo nl2br(htmlspecialchars($home->how_description)) ?></p>
              <?php } ?>
              <div>
                 <ul class="list-unstyled p-0">
                  <?php foreach ([$home->how_li1, $home->how_li2, $home->how_li3] as $li) {
                    if (empty($li)) {
                      continue;
                    } ?>
                    <li class="position-relative text-white d-flex g-4">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path fill="#69ba2d" d="M22 9V7h-1V5h-1V4h-1V3h-2V2h-2V1H9v1H7v1H5v1H4v1H3v2H2v2H1v6h1v2h1v2h1v1h1v1h2v1h2v1h6v-1h2v-1h2v-1h1v-1h1v-2h1v-2h1V9zm-4 3h-1v1h-1v1h-1v1h-1v1h-1v1h-1v1h-2v-1H9v-1H8v-1H7v-1H6v-2h1v-1h2v1h1v1h2v-1h1v-1h1v-1h1V9h1V8h2v1h1v2h-1z" />
                      </svg>
                      </span>
                       <?php echo htmlspecialchars($li) ?></li>
                  <?php } ?>
            </ul>
                  
              </div>
              <!-- heading title con -->
            </div>
            <!-- support content con -->
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- support con -->
  </section>



  <section class="float-left w-100 web-hosting-solutions-con position-relative padding-top padding-bottom main-box background-navy-dark">
    <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-7">
          <div class="web-solutions-content-con position-relative">
            <div class="heading-title-con mb-0">
              <?php if (!empty($home->about_short_title)) { ?>
                <span class="special-text d-block orange-text"><?php echo htmlspecialchars($home->about_short_title) ?></span>
              <?php } ?>
              <?php if (!empty($home->about_title)) { ?>
                <h2 class="text-white font-weight-600"><?php echo htmlspecialchars($home->about_title) ?></h2>
              <?php } ?>
              <?php if (!empty($home->about_description)) { ?>
                <p class="text-white font-size-16"><?php echo nl2br(htmlspecialchars($home->about_description)) ?></p>
              <?php } ?>
              <!-- heading title con -->
            </div>

            <ul class="list-unstyled p-0">
              <?php foreach ([$home->about_li1, $home->about_li2, $home->about_li3, $home->about_li4] as $li) {
                if (empty($li)) {
                  continue;
                } ?>
                <li class="position-relative text-white"><i class="fa fa-check blue-text position-absolute"></i> <?php echo htmlspecialchars($li) ?></li>
              <?php } ?>
            </ul>
            <div class="primary-button d-inline-block">
              <a href="about" class="d-inline-block">Read More <i class="fas fa-arrow-right ml-2"></i>
              </a>
            </div>
            <!-- web solutions content con -->
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- web hosting solutions con -->
  </section>

 


  <!-- HOME PAGE PRODUCTS SECTION -->
  <section class="float-left w-100 position-relative featured-games-con padding-top padding-bottom main-box background-navy-medium">
    <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block"><?php echo $our_latest_products ?> </span>
        <h2 class="text-white"><?php echo $product_title ?></h2>
        <!-- heading title con -->
      </div>
      <div class="row">
        <?php if (empty($home_products)) { ?>
          <div class="col-12">
            <p class="text-white text-center mb-0">No products found.</p>
          </div>
        <?php } ?>
        <?php foreach ($home_products as $product) { ?>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="game-box w-100 position-relative">
              <figure class="position-relative zoom"><img src="admin/<?php echo str_replace('\\', '/', $product->picture_path()) ?>"
                  alt="<?php echo !empty($product->image_alt) ? htmlspecialchars($product->image_alt) : htmlspecialchars($product->title) ?>">
              </figure>
              <div class="game-details position-absolute">
                <h4 class="text-white teko-font"><?php echo htmlspecialchars($product->title) ?></h4>
                <p class="text-white mb-2"><?php echo mb_strimwidth(strip_tags($product->details), 0, 70, '...') ?></p>
              </div>
              <!-- game box -->
            </div>
            <!-- col -->
          </div>
        <?php } ?>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- home products con -->
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

  <section
    class="float-left w-100 position-relative padding-top padding-bottom location-con main-box text-center background-navy-dark">
    <figure><img src="assets/images/right-shape.png" alt="shape" class="position-absolute right-shape"></figure>
    <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="row">
        <div class="col-12">
          <div class="location_content text-center" data-aos="fade-up">
            <div class="heading-title-con mb-0">
              <span class="special-text green-text d-block">Worldwide Server Locations</span>
              <h2 class="text-white">Multiple Data Centers For Optimal <br>
                Game Performance.</h2>
              <!-- heading title con -->
            </div>
            <figure class="locationmap-image mb-0">
              <img src="./assets/images/locationmap-image.png" alt="image" class="img-fluid">
            </figure>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN SECTION -->
  <section class="blog-posts blogpage-section three-column-con w-100 float-left background-navy-light" id="three">
    <div class="container">
      <div class="row wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
        <div id="blog" class="col-xl-12">
          <div class="heading-title-con text-center">
            <span class="special-text green-text d-block"><?php echo $latest_blogs ?> </span>
            <h2 class="text-white"><?php echo $blog_title ?></h2>
            <!-- heading title con -->
          </div>
          <!--   -->
          <div class="row">
            <?php foreach ($home_blogs as $blog) { ?>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="blog-box blog-box1">

                  <figure class="blog-image mb-0"><img src="admin/<?php echo str_replace('\\', '/', $blog->picture_path()) ?>"
                      alt="<?php echo !empty($blog->image_alt) ? htmlspecialchars($blog->image_alt) : htmlspecialchars($blog->title) ?>" class="img-fluid">
                  </figure>
                  <div class="lower-portion">
                    <div class="span-i-con">
                      <i class="fa-solid fa-user"></i>
                      <span class="text-size-14 text-mr">By : <?php echo $blog->name ?></span>


                    </div>
                    <a href="blog/<?php echo $blog->title_url ?>">
                      <h5><?php echo htmlspecialchars($blog->title) ?></h5>
                    </a>
                  </div>
                  <div class="button-portion ">
                    <div class="date">
                      <i class="mb-0 calendar-ml fa-solid fa-calendar-days"></i>
                      <span class="mb-0 text-size-14"><?php echo date('d F Y', strtotime($blog->created_at)) ?></span>
                    </div>
                    <div class="button">
                      <a class="mb-0 read_more text-decoration-none hover-animate"
                        href="blog/<?php echo $blog->title_url ?>">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php
  $faqs = [];
  if ($home) {
    for ($i = 1; $i <= 5; $i++) {
      $title = $home->{"faq{$i}_title"};
      $desc = $home->{"faq{$i}_description"};
      if (!empty($title) || !empty($desc)) {
        $faqs[] = ['title' => $title, 'description' => $desc];
      }
    }
  }
  ?>
  <?php if (!empty($faqs)) { ?>

    <!-- QUESTION ANSWERS SECTION -->
    <section class=" float-left w-100 position-relative faq-con padding-top padding-bottom main-box background-navy-light ">
      <figure><img src="assets/images/ellipse2.png" alt="element" class="position-absolute element"></figure>
      <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="faq_content position-relative">
              <span class="special-text purple-text d-block"><?php echo $faq_title1 ?></span>
              <h2 class="font-weight-600"><?php echo $faq_title2 ?></h2>
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
                    <?php
                    // FAQs are pulled from admin > Home Page (up to 5 title/description
                    // pairs per language) - blank pairs are skipped.
                    $faq_numbers = ['One', 'Two', 'Three', 'Four', 'Five'];
                    $faq_first_open = true;
                    if ($home) {
                      for ($i = 1; $i <= 5; $i++) {
                        $faq_title_field = "faq{$i}_title";
                        $faq_desc_field = "faq{$i}_description";
                        $faq_title = $home->$faq_title_field;
                        $faq_desc = $home->$faq_desc_field;
                        if (empty($faq_title) && empty($faq_desc)) {
                          continue;
                        }
                        $faq_id = $faq_numbers[$i - 1];
                    ?>
                        <div class="accordion-card">
                          <div class="card-header" id="heading<?php echo $faq_id ?>">
                            <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $faq_id ?>"
                              aria-expanded="false" aria-controls="collapse<?php echo $faq_id ?>">
                              <h5><?php echo htmlspecialchars($faq_title) ?></h5>
                            </a>
                          </div>
                          <div id="collapse<?php echo $faq_id ?>" class="collapse<?php echo $faq_first_open ? ' show' : '' ?>" aria-labelledby="heading<?php echo $faq_id ?>"
                            data-parent="#home1_accordion1">
                            <div class="card-body">
                              <p class="text-size-16 text-left mb-0"><?php echo nl2br(htmlspecialchars($faq_desc)) ?>
                              </p>
                            </div>
                          </div>
                        </div>
                    <?php
                        $faq_first_open = false;
                      }
                    }
                    ?>
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

 
<section
    class="float-left w-100 position-relative customers-reviews-con padding-top padding-bottom main-box text-center background-navy-medium">
    <figure><img src="assets/images/left-shape.png" alt="shape" class="position-absolute left-shape"></figure>
    <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
      <div class="heading-title-con text-center">
        <span class="special-text green-text d-block">Gaming Insights & Resources</span>
        <h2 class="text-white">Tips, Guides, And Updates For <br>
          Your Gaming Experience. </h2>
        <!-- heading title con -->
      </div>
      <!-- carousel -->
      <div class="owl-carousel">
        <div class="item">
          <div class="white-box">
            <p>Lorem ipsum dolor sit amet con secter dipiscing elit, sed do eiusmo dtempor dolor idunt ut labore et dol
              ore magnia ad minim elialiqua.</p>
            <figure class="text-center"><img src="assets/images/customer-review1.png" alt="icon" class="img-fluid">
            </figure>
            <h4>Rizwan Joseph</h4>
            <span class="d-block inter-font">Co-Founder</span>
            <!-- white box -->
          </div>
          <!-- item -->
        </div>
        <div class="item">
          <div class="white-box">
            <p>Duis aute irure dolor in reprehen derit in emvoluptate velit esse cillu mdolore eu dolo fugiat nulla
              pariatu Excepteur sint anim id est.</p>
            <figure class="text-center"><img src="assets/images/customer-review2.png" alt="icon" class="img-fluid">
            </figure>
            <h4>Alexandra Jorden</h4>
            <span class="d-block inter-font">Cheif Executive</span>
            <!-- white box -->
          </div>
          <!-- item -->
        </div>
        <div class="item">
          <div class="white-box">
            <p>Lorem ipsum dolor sit amet con secter dipiscing elit, sed do eiusmo dtempor dolor idunt ut labore et dol
              ore magnia ad minim elialiqua.</p>
            <figure class="text-center"><img src="assets/images/customer-review3.png" alt="icon" class="img-fluid">
            </figure>
            <h4>Anthory Clark</h4>
            <span class="d-block inter-font">Director</span>
            <!-- white box -->
          </div>
          <!-- item -->
        </div>
        <!-- owl carousel -->
      </div>
      <!-- container -->
    </div>
    <!-- customer review con  -->
  </section>

   <!-- CTA SECTION -->


    <section  class="float-left w-100 position-relative cta-con main-box z-index-1 background-navy-medium">
      <div class="container wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s" >
        <!-- <div class="cta-inner-con padding-top100 padding-bottom100"> -->
          
          <div class="cta-inner-con padding-top100 padding-bottom100 "<?php if (!empty($home->newsletter_image)) { ?> style="background-image: url('admin/<?php echo str_replace('\\', '/', $home->image_path('newsletter_image')); ?>');"<?php } ?>>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <!-- col -->
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="cta-content-con">
                <div class="heading-title-con mb-0">
                  <!-- <span class="special-text green-text d-block">Fast, Secure, and Always Online</span> -->
                            <?php if (!empty($home->newsletter_short_title)) { ?>
                    <span class="special-text green-text d-block"><?php echo htmlspecialchars($home->newsletter_short_title) ?></span>
                  <?php } ?>
                            <?php if (!empty($home->newsletter_title)) { ?>
                    <h2 class="text-white"><?php echo htmlspecialchars($home->newsletter_title) ?></h2>
                  <?php } ?>
                  <div class="secondary-button d-inline-block">
                    <a href="contact" class="d-inline-block"><?php echo htmlspecialchars($home->newsletter_button_name) ?>  <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                  </div>
                  <!-- heading title con -->
                </div>
                <!-- cta content con -->
              </div>
              <!-- col -->
            </div>
            <!-- row -->
          </div>
          <!-- cta inner con -->
        </div>
        <!-- container -->
      </div>
      <!-- cta con  -->
    </section>


  <?php } ?>
  <!-- CTA SECTION -->

 

  <!-- FOOTER SECTION -->
  <?php include "includes/footer.php" ?>
  <?php include "includes/script.php" ?>
</body>

</html>