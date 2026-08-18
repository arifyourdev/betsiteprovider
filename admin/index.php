<?php require_once "private/initialize.php";
 $admin_data = Header::find_by_id('1');
$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if (is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if (is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if (empty($errors)) {
        $admin = Admin::find_by_username($username);
        // test if admin found and password is correct
        if ($admin != false && $admin->verify_password($password)) {
            // Mark admin as logged in
            $session->login($admin); 
            $_SESSION['username'] = $username;
            redirect_to(url_for('blog'));
        } else {
            // username not found or password does not match
            $errors[] = "Username And Password Not Exist.";
        }
    }
}
?>
<!doctype html>
<html lang="en">

    <head> 
    <?php include 'include/head.php'?>
   </head>
   <body> 
        <section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center"> 
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                    <div class="col-lg-8 offset-md-4 align-self-center mt-3 mb-3"> 
                            <img src="<?php echo $admin_data->picture_path()?>" class="img-fluid rounded-normal" alt="">
                        </div>
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from rounded" style="background:#19473D">
                              <h3 class="mb-0 text-center text-white">Sign in</h3>
                              <p class="text-center text-white">Enter your Username and password to access admin panel.</p>
                              <form class="mt-4 form-text" method="post" enctype="multipart/form-data">
                              <?php echo display_errors($errors); ?>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Username</label>
                                      <input type="text" class="form-control mb-0" id="exampleInputEmail1" name="username" placeholder="Enter Username">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label> 
                                      <input type="password" class="form-control mb-0" name="password" id="exampleInputPassword1" placeholder="Password">
                                  </div> 
                                  <div class="sign-info text-center">
                                      <button type="submit" style="color:#000" class="btn btn-white d-block w-100 mb-2">Sign in</button> 
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!-- Sign in END --> 
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/jquery.appear.js"></script> 
      <script src="js/countdown.min.js"></script> 
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script> 
      <script src="js/wow.min.js"></script> 
      <script src="js/apexcharts.js"></script> 
      <script src="js/lottie.js"></script> 
      <script src="js/slick.min.js"></script> 
      <script src="js/select2.min.js"></script> 
      <script src="js/owl.carousel.min.js"></script> 
      <script src="js/jquery.magnific-popup.min.js"></script> 
      <script src="js/smooth-scrollbar.js"></script> 
      <script src="js/style-customizer.js"></script> 
      <script src="js/chart-custom.js"></script> 
      <script src="js/custom.js"></script>
   </body> 
</html>
