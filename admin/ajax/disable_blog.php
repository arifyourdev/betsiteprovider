<?php require_once "../private/initialize.php";
if (is_post_request()) {

    $id = $_POST['id'];
    
    $update = Blog::disable_blog($id);
 } else {
    redirect_to($base_url);
}
 
?>