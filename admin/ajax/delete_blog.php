<?php require_once "../private/initialize.php";

if(is_post_request()){

    $id = $_POST['id'];
    $blog = Blog::find_by_id($id);

    // Only remove the physical file if no linked counterpart still uses it.
    if (Blog::count_using_image($blog->blog_image, $id) === 0) {
        $path = $blog->picture_path();
        $file_path = "../$path";
        unlink($file_path);
    }

     $delete = Blog::delete_blog($id);
 }else{
    redirect_to($admin_base_url);
}
?>