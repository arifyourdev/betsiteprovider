<?php require_once 'private/initialize.php';
require_login();
$page="update_image"; 
$id = $_GET['id'];
$header_images = Header::find_by_id($id);

  if($header_images == false){
      redirect_to(url_for('site_admin'));
    }  
 if (is_post_request()) {
        $title = htmlentities($database->escape_string($_POST['header_images']['title'])); 
       $args = $_POST['header_images'];
      
       $header_images->merge_attributes();
       if(is_uploaded_file($_FILES['logo']['tmp_name'])){
        $path = $header_images->picture_path();
        $file_path = $path;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
         $header_images->set_file($_FILES['logo']);
         $header_images->title = $title;
         $result = $header_images->save_photo();
       }
       if(is_uploaded_file($_FILES['favicon']['tmp_name'])){
        $path3 = $header_images->favicon();
        $file_path3 = $path3;
        if (file_exists($file_path3)) {
            unlink($file_path3);
        }
         $header_images->set_file3($_FILES['favicon']);
         $header_images->title = $title;
         $result = $header_images->save_photo3();
       }
     else{ 
        $header_images->title = $title;
       $result = $header_images->save();
     }

    if($result === true) {

        $session->message('Images Updated successfully.'); 
 }
 else {
 	$session->message(join("<br>", $header_images->errors));

  }
     
} else {
     $header_images = new Header;
}
?>
<!doctype html>
<html lang="en"> 
<head>
      <!-- Required meta tags -->
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
                                    <h4 class="card-title">Update Images</h4> 
                                </div>
                            </div>
                            <div class="iq-card-body"> 
                            <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php include "forms/images_form.php"?> 
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <a href="blog" class="btn btn-secondary">Cancel</a>
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