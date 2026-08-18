<?php require_once 'private/initialize.php';
require_login();
$page = "blog";
if(!isset($_GET['id'])) {
    redirect_to('blog');
  }

$id = $_GET['id'];
$blog = Blog::find_by_id($id); 
  if($blog == false){
      redirect_to(url_for('blog'));
    } 
  
    if(is_post_request()){

      $title = htmlentities($database->escape_string($_POST['blog']['title']));
      $language = htmlentities($database->escape_string($_POST['blog']['language']));
       $args = $_POST['blog'];

       $blog->merge_attributes($args);
       $blog->title = $title;
       $blog->language = $language;

       // A blog can be linked to its counterpart in the other language so
       // both share a single uploaded image instead of two separate uploads.
       $link_id = $_POST['link_blog_id'] ?? '';
       $linked_blog = $link_id ? Blog::find_by_id($link_id) : false;
       $image_uploaded = is_uploaded_file($_FILES['blog_image']['tmp_name']);

       if($image_uploaded){
        $path = $blog->picture_path();
        $file_path = $path;
        unlink($file_path);
         $blog->set_file($_FILES['blog_image']);
         $result = $blog->save_photo();
       } elseif($linked_blog) {
         // No new file - reuse the linked blog's existing image.
         $blog->blog_image = $linked_blog->blog_image;
         $result = $blog->save();
       } else {
         $result = $blog->save();
       }

  if($result === true) {

    if($linked_blog) {
        $group_id = Blog::link($linked_blog->id, $blog->id);
        // If a fresh image was uploaded here, push it onto the linked blog too.
        if($image_uploaded) {
            Blog::sync_image_to_group($group_id, $blog->blog_image, $blog->id);
        }
        // Keep both languages at the same Title Url, so the frontend can
        // show either language at one common URL.
        Blog::sync_title_url_to_group($group_id, $blog->title_url, $blog->id);
    } else {
        Blog::unlink($blog->id);
    }

    $session->message('The Blog was Updated successfully.');
    redirect_to(url_for('blog/'.$language));

  } else {
    // show errors
    $session->message(join("<br>", $blog->errors));

  }

}
else{
     // display the form
     $blog = new Blog;
}
 
?>
<!doctype html>
<html lang="en"> 
<head>
      <!-- Require meta tags -->
      <base href="<?php echo $base_url_admin ?>">
      <?php include 'include/head.php'?> 
   </head> 
   <style>
     .ck.ck-editor__main dl,.ck.ck-editor__main ol,.ck.ck-editor__main ul{
        color:#000
    }
    .ck.ck-editor__main h1,.ck.ck-editor__main h2,.ck.ck-editor__main h3,.ck.ck-editor__main h4,.ck.ck-editor__main h5,.ck.ck-editor__main h6{
        color:#000
    }
   </style>
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
                                    <h4 class="card-title">Update Blog</h4> 
                                </div> 
                            </div>
                            <div class="iq-card-body"> 
                                <h4 class="card-title text-success"><?php echo display_session_message();?></h4>
                                <form class="needs-validation" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php include "forms/blog_form.php"?> 
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="blog/<?php echo $blog->language?>" class="btn btn-secondary">Cancel</a>
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
        .create(document.querySelector('textarea[name="blog[details]"]')) ;
  </script>
   </body> 
</html>