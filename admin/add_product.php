<?php require_once 'private/initialize.php';
require_login();
$page = "product";
if(isset($_GET['language'])) {
    $language = $_GET['language']; 
}
if(is_post_request()){

 $title = htmlentities($database->escape_string($_POST['product']['title']));
  $args = $_POST['product'];
  $product = new Product($args);
  $product->title = $title;
  $product->status ='Y';
  $product->created_at = $time;
  $product->language = $language;

  // A product can be linked to its counterpart in the other language so
  // both share a single uploaded image and Title Url instead of separate ones.
  $link_id = $_POST['link_product_id'] ?? '';
  $linked_product = $link_id ? Product::find_by_id($link_id) : false;

  if($linked_product) {
    // Reuse the linked product's Title Url regardless of what was posted.
    $product->title_url = $linked_product->title_url;
  }

  if(is_uploaded_file($_FILES['product_image']['tmp_name'])){
    $product->set_file($_FILES['product_image']);
    $result = $product->save_photo();
  } elseif($linked_product) {
    // No new file - reuse the linked product's existing image.
    $product->product_image = $linked_product->product_image;
    $result = $product->save();
  } else {
    $product->errors[] = "Please upload a Product Image or link with an existing product.";
    $result = false;
  }

 if($result === true)
    {
    if($linked_product) {
        $group_id = Product::link($linked_product->id, $product->id);
        // If a fresh image was uploaded here, push it onto the linked product too.
        if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
            Product::sync_image_to_group($group_id, $product->product_image, $product->id);
        }
    } else {
        Product::set_group($product->id, $product->id);
    }
    $session->message('The Product was created successfully.');
    redirect_to(url_for('products/'.$language));

  } else {
    $session->message(join("<br>", $product->errors));

  }

}
else{ 
     $product = new Product;
}


?>
<!doctype html>
<html lang="en"> 
<head>
<base href="<?php echo $base_url_admin?>">
      <!-- Required meta tags -->
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
                                    <h4 class="card-title">Add Product</h4> 
                                </div> 
                            </div>
                            <div class="iq-card-body"> 
                                <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php include "forms/product_form.php"?> 
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="products/<?php echo $language?>" class="btn btn-secondary">Cancel</a>
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
      <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('textarea[name="product[details]"]'));
        </script> 
   </body> 
</html>