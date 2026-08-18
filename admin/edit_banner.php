<?php require_once 'private/initialize.php';
require_login();
$page = "banner";
if(!isset($_GET['id'])) {
    redirect_to('banners');
  }

$id = $_GET['id'];
$banner = Banner::find_by_id($id);
  if($banner == false){
      redirect_to(url_for('banners'));
    }

    if(is_post_request()){

      $shor_title = htmlentities($database->escape_string($_POST['banner']['shor_title']));
      $language = htmlentities($database->escape_string($_POST['banner']['language']));
       $args = $_POST['banner'];

       $banner->merge_attributes($args);
       $banner->shor_title = $shor_title;
       $banner->language = $language;

       // A banner can be linked to its counterpart in the other language so
       // both share a single uploaded image instead of two separate uploads.
       $link_id = $_POST['link_banner_id'] ?? '';
       $linked_banner = $link_id ? Banner::find_by_id($link_id) : false;
       $image_uploaded = is_uploaded_file($_FILES['banner_image']['tmp_name']);

       if($image_uploaded){
        $path = $banner->picture_path();
        $file_path = $path;
        unlink($file_path);
         $banner->set_file($_FILES['banner_image']);
         $result = $banner->save_photo();
       } elseif($linked_banner) {
         // No new file - reuse the linked banner's existing image.
         $banner->image = $linked_banner->image;
         $result = $banner->save();
       } else {
         $result = $banner->save();
       }

  if($result === true) {

    if($linked_banner) {
        $group_id = Banner::link($linked_banner->id, $banner->id);
        // If a fresh image was uploaded here, push it onto the linked banner too.
        if($image_uploaded) {
            Banner::sync_image_to_group($group_id, $banner->image, $banner->id);
        }
    } else {
        Banner::unlink($banner->id);
    }

    $session->message('The Banner was Updated successfully.');
    redirect_to(url_for('banners/'.$language));

  } else {
    // show errors
    $session->message(join("<br>", $banner->errors));

  }

}
else{
     // display the form
     $banner = new Banner;
}

?>
<!doctype html>
<html lang="en">
<head>
      <!-- Require meta tags -->
      <base href="<?php echo $base_url_admin ?>">
      <?php include 'include/head.php'?>
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
                                    <h4 class="card-title">Update Banner</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php include "forms/banner_form.php"?>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="banners/<?php echo $banner->language?>" class="btn btn-secondary">Cancel</a>
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
