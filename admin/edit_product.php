<?php require_once 'private/initialize.php';
require_login();
$page = "product";
if(!isset($_GET['id'])) {
    redirect_to('add_product');
  }

$id = $_GET['id'];
$product = Product::find_by_id($id);
  if($product == false){
      redirect_to(url_for('add_product'));
    } 


    if(is_post_request()){

      $title = htmlentities($database->escape_string($_POST['product']['title']));
      $language = htmlentities($database->escape_string($_POST['product']['language']));
       $args = $_POST['product'];

       $product->merge_attributes($args);
       $product->title = $title;
       $product->language = $language;

       // A product can be linked to its counterpart in the other language so
       // both share a single uploaded image and Title Url instead of separate ones.
       $link_id = $_POST['link_product_id'] ?? '';
       $linked_product = $link_id ? Product::find_by_id($link_id) : false;
       $image_uploaded = is_uploaded_file($_FILES['product_image']['tmp_name']);

       if($linked_product) {
         // Reuse the linked product's Title Url regardless of what was posted.
         $product->title_url = $linked_product->title_url;
       }

       if($image_uploaded){
        $path = $product->picture_path();
        $file_path = $path;
        unlink($file_path);
         $product->set_file($_FILES['product_image']);
         $result = $product->save_photo();
       } elseif($linked_product) {
         // No new file - reuse the linked product's existing image.
         $product->product_image = $linked_product->product_image;
         $result = $product->save();
       } else {
         $result = $product->save();
       }

  if($result === true) {

    if($linked_product) {
        $group_id = Product::link($linked_product->id, $product->id);
        // If a fresh image was uploaded here, push it onto the linked product too.
        if($image_uploaded) {
            Product::sync_image_to_group($group_id, $product->product_image, $product->id);
        }
    } elseif($language == 'Bengali') {
        // Bengali form shows the "Link with" dropdown, so a blank value here
        // is a deliberate choice to unlink - honour it.
        Product::unlink($product->id);
    } elseif(!empty($product->group_id) && $image_uploaded) {
        // English products don't show the link dropdown, so there is nothing
        // in the POST to tell us about the existing link - keep it intact and
        // just push the newly uploaded image to every product sharing the group
        // (i.e. the linked Bengali counterpart) so both stay in sync.
        Product::sync_image_to_group($product->group_id, $product->product_image, $product->id);
    }

    $session->message('The Product was Updated successfully.');

    redirect_to(url_for('products/'.$language));

  } else {
    // show errors
    $session->message(join("<br>", $product->errors));

  }

}
else{
     // display the form
     $product = new Product;
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
                                    <h4 class="card-title">Update Product</h4> 
                                </div> 
                            </div>
                            <div class="iq-card-body"> 
                                <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php include "forms/product_form.php"?> 
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="products/<?php echo $product->language?>" class="btn btn-secondary">Cancel</a>
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
                .create(document.querySelector('textarea[name="product[details]"]')) ;
        </script>   
   </body> 
</html>