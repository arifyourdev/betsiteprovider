<?php require_once 'private/initialize.php';
require_login();
$language = (isset($_GET['language']) && $_GET['language'] === 'Bengali') ? 'Bengali' : 'English';
$page = "home-" . $language;
$home = Home::find_by_language($language);

  if($home == false){
      redirect_to(url_for('blog'));
    }

if (is_post_request()) {

    $args = $_POST['home'];
    $home->merge_attributes($args);

    // Images are optional on every save - only touch them (and remove the
    // old file) when a new one was actually uploaded.
    $image_fields = ['about_image', 'faq_image', 'newsletter_image'];
    foreach ($image_fields as $field) {
        if (is_uploaded_file($_FILES[$field]['tmp_name'] ?? '')) {
            $old_path = $home->image_path($field);
            if ($home->set_image($field, $_FILES[$field]) && file_exists($old_path)) {
                unlink($old_path);
            }
        }
    }

    $result = $home->save_all();

    if ($result === true) {
        $session->message('The Home page has been updated successfully.');
        redirect_to(url_for('home/' . $language));
    } else {
        $session->message(join("<br>", $home->errors));
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
                                    <h4 class="card-title">Update Home Page</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                            <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                    <?php include "forms/home_form.php"?>
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
