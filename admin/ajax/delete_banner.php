<?php require_once "../private/initialize.php";

if(is_post_request()){

    $id = $_POST['id'];
    $banner = Banner::find_by_id($id);

    // Only remove the physical file if no linked counterpart still uses it.
    if (Banner::count_using_image($banner->image, $id) === 0) {
        $path = $banner->picture_path();
        $file_path = "../$path";
        unlink($file_path);
    }

     $delete = Banner::delete_banner($id);
 }else{
    redirect_to($admin_base_url);
}
?>
