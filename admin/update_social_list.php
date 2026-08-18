<?php 
require_once 'private/initialize.php';
require_login();
$page = "socials"; 
$id = $_GET['id'];
$socials = Sociallist::find_by_id($id);

  if($socials == false){
      redirect_to(url_for('update_socials/1'));
    }  
 if (is_post_request()) {
     
    $name = htmlentities($database->escape_string($_POST['socials']['mail']));
    $args = $_POST['socials'];
    $socials->merge_attributes($args);
    $socials->name = $name;
     $result = $socials->save();
    
    if($result === true) {
	$session->message('The Socials Updated successfully.');
        redirect_to(url_for('update_socials/1'));
 }
 else {
 	$session->message(join("<br>", $socials->errors));

  }
     
} else {
     $socials = new Inquiry;
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
                                    <h4 class="card-title">Update Socials</h4> 
                                </div>
                            </div>
                            <div class="iq-card-body"> 
                            <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php include "forms/social_form.php"?> 
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <a href="blog/English" class="btn btn-secondary">Cancel</a>
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
