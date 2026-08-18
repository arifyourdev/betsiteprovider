  <?php
    // SOCIAL LINKS - pulled from admin > Socials. Only links with a saved
    // value are rendered, in a fixed icon order.
    $footer_socials = Sociallist::find_by_single_inquiry();
    $footer_social_links = [];
    if ($footer_socials) {
      $footer_social_links = [
        'facebook'  => ['url' => $footer_socials->facebook, 'icon' => 'fa-brands fa-facebook-f'],
        'instagram' => ['url' => $footer_socials->instagram, 'icon' => 'fa-brands fa-instagram'],
        'telegram'  => ['url' => $footer_socials->telegram, 'icon' => 'fa-brands fa-telegram'],
        'youtube'   => ['url' => $footer_socials->youtube, 'icon' => 'fa-brands fa-youtube'],
        'whatsapp'  => ['url' => !empty($footer_socials->whatsapp) ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $footer_socials->whatsapp) : '', 'icon' => 'fa-brands fa-whatsapp'],
        
      ];
    }
  ?>
  <section class="float-left w-100 position-relative footer-con main-box background-navy-dark padding-top">
    <figure><img src="assets/images/pattern.png" alt="pattern" class="position-absolute pattern"></figure>

    <div class="container">
      <div class="middle-portion">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="<?php echo $base_url ?>">
              <figure class="footer-logo">
                <?php
                  // SITE LOGO - same source as includes/header.php (admin > Images).
                  if (!isset($site_logo_src)) {
                    $site_logo_list = Header::find_by_order();
                    $site_logo = !empty($site_logo_list) ? $site_logo_list[0] : false;
                    $site_logo_src = ($site_logo && !empty($site_logo->logo)) ? 'admin/' . str_replace('\\', '/', $site_logo->picture_path()) : 'assets/images/logo.png';
                    $site_logo_alt = ($site_logo && !empty($site_logo->title)) ? $site_logo->title : '';
                  }
                ?>
                <img src="<?php echo htmlspecialchars($site_logo_src) ?>" class="img-fluid" alt="<?php echo htmlspecialchars($site_logo_alt) ?>">
              </figure>
            </a>
            <p class="text-size-16 footer-text"><?php echo $foooter_about_title ?></p>
            <ul class="list-unstyled mb-0 social-icons">
              <?php foreach ($footer_social_links as $network => $social) { ?>
                <?php if (!empty($social['url'])) { ?>
                  <li><a href="<?php echo htmlspecialchars($social['url']) ?>" class="text-decoration-none"
                      target="_blank" rel="noopener noreferrer"><i
                        class="<?php echo $social['icon'] ?> social-networks"></i></a>
                  </li>
                <?php } ?>
              <?php } ?>
              <!-- social icons -->
            </ul>
            <!-- col -->
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6 col-12">
            <div class="links footer-inner-links">
              <h4 class="text-white"><?php echo $useful_links ?></h4>
              <ul class="list-unstyled mb-0">
                <li><i class="fa-solid fa-circle"></i><a href="/"
                    class=" text-size-16 text text-decoration-none"><?php echo $hdr_nav_home ?></a></li>
                <li><i class="fa-solid fa-circle"></i><a href="about"
                    class=" text-size-16 text text-decoration-none"><?php echo $hdr_nav_about ?></a></li>
                <li><i class="fa-solid fa-circle"></i><a href="b2b-whitelabel"
                    class=" text-size-16 text text-decoration-none"><?php echo $hdr_nav_services ?></a></li>
                <li class="mb-0"><i class="fa-solid fa-circle"></i><a href="contact"
                    class=" text-size-16 text text-decoration-none"><?php echo $hdr_cta_contact ?></a></li>
                <!--  -->
              </ul>
              <!-- footer inner links -->
            </div>
            <!-- col -->
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12 pr-0">
            <div class="icon footer-inner-links">
              <h4 class="text-white"><?php echo $contact_us ?></h4>
              <ul class="list-unstyled mb-0">
                <li class="text">
                  <i class="fa fa-phone fa-icon footer-location"></i>
                  <a href="tel:+61383766284" class="mb-0 text text-decoration-none text-size-16"><?php echo $footer_socials->whatsapp; ?></a>
                </li>
                <li class="text">
                  <i class="fa fa-envelope fa-icon footer-location"></i>
                  <a href="mailto:Info@pixelmod.com"
                    class="mb-0 text text-decoration-none text-size-16"><?php echo $footer_socials->mail; ?></a>
                </li>
                
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12  pl-0">
            <div class="email-form footer-inner-links">
              <h4 class="text-white"><?php echo $newsletter ?></h4>
              <form action="javascript:;">
                <div class="form-group position-relative">
                  <input type="text" class="form_style" placeholder="Enter Email:" name="email">
                  <button><i class="send fa-sharp fa-solid fa-paper-plane"></i></button>
                </div>
               
              </form>
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- middle portion -->
      </div>
      <div class="copyright">
        <div class="row">
          <div class="col-12">
            <p class="mb-0"><?php echo $copy_right; ?></p>
            <!-- col -->
          </div>
          <!-- row -->
        </div>
        <!-- copyright -->
      </div>
      <!-- container -->
    </div>
    <!-- footer section -->
  </section>