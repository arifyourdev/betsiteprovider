<?php require_once 'private/initialize.php';
require_login();
$language = (isset($_GET['language']) && $_GET['language'] === 'Bengali') ? 'Bengali' : 'English';
$page = "about-" . $language;
$about = About::find_by_language($language);

  if($about == false){
      redirect_to(url_for('blog'));
    }

if (is_post_request()) {

    $args = $_POST['about'];
    $about->merge_attributes($args);

    // Images are optional on every save - only touch them (and remove the
    // old file) when a new one was actually uploaded.
    if (is_uploaded_file($_FILES['breadcrumb_image']['tmp_name'] ?? '')) {
        $old_path = $about->breadcrumb_image_path();
        if ($about->set_breadcrumb_image($_FILES['breadcrumb_image']) && file_exists($old_path)) {
            unlink($old_path);
        }
    }

    if (is_uploaded_file($_FILES['company_image']['tmp_name'] ?? '')) {
        $old_path = $about->company_image_path();
        if ($about->set_company_image($_FILES['company_image']) && file_exists($old_path)) {
            unlink($old_path);
        }
    }

    $result = $about->save_all();

    if ($result === true) {
        $session->message('The About page has been updated successfully.');
        redirect_to(url_for('about/' . $language));
    } else {
        $session->message(join("<br>", $about->errors));
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo $base_url_admin?>">
    <!-- Required meta tags -->
    <?php include 'include/head.php' ?>
</head>
    <body>
        <div class="wrapper">
            <?php include "include/sidebar.php" ?>
            <!-- TOP Nav Bar -->
            <?php include "include/header.php" ?>
            <!-- TOP Nav Bar END -->
            <!-- Page Content  -->
            <div id="content-page" class="content-page">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Update About Us Page</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                            <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                    <?php include "forms/about_form.php"?>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper END -->
        <!-- Footer -->
        <?php include "include/footer.php" ?>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.appear.js"></script>
      <script src="js/countdown.min.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/apexcharts.js"></script>
      <script src="js/slick.min.js"></script>
      <script src="js/select2.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/smooth-scrollbar.js"></script>
      <script src="js/lottie.js"></script>
      <script src="js/core.js"></script>
      <script src="js/charts.js"></script>
      <script src="js/animated.js"></script>
      <script src="js/kelly.js"></script>
      <script src="js/maps.js"></script>
      <script src="js/worldLow.js"></script>
      <script src="js/raphael-min.js"></script>
      <script src="js/morris.js"></script>
      <script src="js/morris.min.js"></script>
      <script src="js/flatpickr.js"></script>
      <script src="js/style-customizer.js"></script>
      <script src="js/chart-custom.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
