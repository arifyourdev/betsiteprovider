<?php require_once "../private/initialize.php";

if(is_post_request()){

    $id = $_POST['id'];
    $appl = Inquiry::delete_inquiry($id); 
 }else{
    redirect_to($admin_base_url);
}
?>