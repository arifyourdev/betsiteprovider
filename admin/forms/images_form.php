<?php 
if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $header_images = Header::find_by_id($id); 
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Logo</label> 
    <input type="file" class="form-control-file logo-extension" id="exampleFormControlFile1" name="logo">
    <img src="<?php echo $header_images->picture_path(); ?>" style="width:100px">
</div> 

<div class="col-md-6 mb-3">
    <label for="validationTooltip01">favicon</label> 
    <input type="file" class="form-control-file favicon-extension" id="exampleFormControlFile1" name="favicon">
    <img src="<?php echo $header_images->favicon(); ?>" style="width:100px">
</div>  
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Page Title</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="header_images[title]" value="<?php echo $header_images->title?>"> 
</div> 
<?php }
 else {
} ?>
<script>
   document.getElementsByClassName('logo-extension')[0].addEventListener('change', function() {
        const allowedExtensions = ['png', 'svg'];
        const file = this.files[0];
        const fileName = file ? file.name : '';
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (file && !allowedExtensions.includes(fileExtension)) { 
            alert('Invalid file format! Please upload a valid image format ( png, svg ).');
            this.value = '';  
        }
    });
    document.getElementsByClassName('favicon-extension')[0].addEventListener('change', function() {
        const allowedExtensions = ['png', 'ico'];
        const file = this.files[0];
        const fileName = file ? file.name : '';
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (file && !allowedExtensions.includes(fileExtension)) { 
            alert('Invalid file format! Please upload a valid image format ( png, ico ).');
            this.value = '';  
        }
    });
</script>