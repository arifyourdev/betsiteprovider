    <?php
      // SITE LOGO - pulled from admin > Images. Falls back to the static
      // asset if no logo has been uploaded yet.
      $site_logo_list = Header::find_by_order();
      $site_logo = !empty($site_logo_list) ? $site_logo_list[0] : false;
      $site_logo_src = ($site_logo && !empty($site_logo->logo)) ? 'admin/' . str_replace('\\', '/', $site_logo->picture_path()) : 'assets/images/logo.png';
      $site_logo_alt = ($site_logo && !empty($site_logo->title)) ? $site_logo->title : '';
    ?>
    <header class="w-100 float-left header-con main-box position-relative">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="<?php echo $base_url ?>">
            <figure class="mb-0">
              <img src="<?php echo htmlspecialchars($site_logo_src) ?>" alt="<?php echo htmlspecialchars($site_logo_alt) ?>">
            </figure>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link p-0  <?php echo ($page == "home" || $page == "") ? "active" : ""; ?>" href="<?php echo $base_url ?>"><?php echo $hdr_nav_home; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-0 <?php echo $page == "about" ? "active" : ""; ?>" href="about"><?php echo $hdr_nav_about; ?></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle p-0 <?php echo ($page == "b2b-whitelabel" || $page == "b2c-whitelabel") ? "active" : ""; ?>" href="#" id="navbarDropdown5" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $hdr_nav_services; ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
                  <a class="dropdown-item <?php echo $page == "b2b-whitelabel" ? "active" : ""; ?>" href="b2b-whitelabel"><?php echo $hdr_nav_b2bwhitelabel; ?></a>
                  <a class="dropdown-item <?php echo $page == "b2c-whitelabel" ? "active" : ""; ?>" href="b2c-whitelabel"><?php echo $hdr_nav_b2cwhitelabel; ?></a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link p-0 <?php echo $page == "payment-methods" ? "active" : ""; ?>" href="payment-methods"><?php echo $payment_link; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-0 <?php echo $page == "blogs" ? "active" : ""; ?>" href="blogs"><?php echo $hdr_nav_blog; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-0 <?php echo $page == "contact" ? "active" : ""; ?>" href="contact"><?php echo $hdr_cta_contact; ?></a>
              </li>
            </ul>
            <!--  -->
          </div>

          <div class="language-box">
            <button class="language-select" id="languageSelectBtn" aria-label="select language"
              title="select language" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 5h14M9 2v3m4 0q-2 8-9 11m2-7q2 4 6 6m1 7l5-11l5 11m-1.37-3h-7.26" />
              </svg>

            </button>
            <?php $current_lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'bd') ? 'bd' : 'en'; ?>
            <ul class="language-select-active" id="openLan" style="display: none;">
              <li class="<?php echo $current_lang == 'en' ? 'active' : ''; ?>"><a href="switch_lang?lang=en" style="color:inherit;">EN</a></li>
              <li class="<?php echo $current_lang == 'bd' ? 'active' : ''; ?>"><a href="switch_lang?lang=bd" style="color:inherit;">BD</a></li>
            </ul>
          </div>
        </nav>
        <!-- container -->
      </div>
      <!-- header-con -->
    </header>