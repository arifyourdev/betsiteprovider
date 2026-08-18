<?php require_once "../private/initialize.php";

if(is_post_request()){

    $id = $_POST['id'];
    $product = Product::find_by_id($id);

    // Only remove the physical file if no linked counterpart still uses it.
    if (Product::count_using_image($product->product_image, $id) === 0) {
        $path = $product->picture_path();
        $file_path = "../$path";
        unlink($file_path);
    }

     $delete = Product::delete_product($id);
 }else{
    redirect_to($admin_base_url);
}
?>