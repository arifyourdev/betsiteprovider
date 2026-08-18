<?php 
if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $socials = Sociallist::find_by_id($id); 
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Mail</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="socials[mail]" value="<?php echo $socials->mail ?>"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Whatsapp</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="socials[whatsapp]" value="<?php echo $socials->whatsapp ?>"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Facebook</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="socials[facebook]" value="<?php echo $socials->facebook ?>"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Telegram</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="socials[telegram]" value="<?php echo $socials->telegram ?>"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Youtube</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="socials[youtube]" value="<?php echo $socials->youtube ?>"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Instagram</label> 
    <input type="text" class="form-control" id="exampleFormControlFile1" name="socials[instagram]" value="<?php echo $socials->instagram ?>"> 
</div> 
<?php }
 else {
} ?>