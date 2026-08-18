<?php require_once "../private/initialize.php";
if (is_post_request()) {

    $id = $_POST['id'];

    $update = Banner::enable_banner($id);
 } else {
    redirect_to($base_url);
}

?>
