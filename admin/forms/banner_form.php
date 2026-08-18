<?php
if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $banner = Banner::find_by_id($id);
   $current_language = $banner->language;
   $opposite_language = ($current_language == 'English') ? 'Bengali' : 'English';
   $linkable = Banner::find_linkable($opposite_language, $banner->group_id);
   $linked_id = '';
   foreach ($linkable as $l) {
       if (!empty($banner->group_id) && $l->group_id == $banner->group_id) {
           $linked_id = $l->id;
           break;
       }
   }
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Short Title</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $banner->shor_title ?>" name="banner[shor_title]">
</div>
<input type="hidden" class="form-control" id="validationTooltip01" name="banner[language]" value="<?php echo $banner->language ?>">
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $banner->title ?>" name="banner[title]">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">CTA Title</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $banner->cta_title ?>" name="banner[cta_title]">
</div>
<div class="col-md-6 mb-3">
    <label for="link_banner_id">Link with <?php echo $opposite_language ?> Banner <span class="text-muted">(shares one image)</span></label>
    <select class="form-control" id="link_banner_id" name="link_banner_id">
        <option value="">-- No link (own image) --</option>
        <?php foreach ($linkable as $l) { ?>
        <option value="<?php echo $l->id ?>" <?php if($l->id == $linked_id) echo 'selected'; ?>><?php echo substr($l->shor_title,0,60) ?></option>
        <?php } ?>
    </select>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Banner Image <span style="color:red">(Size =1920 × 700 px)</span></label>
    <div>
        <img src="<?php echo $banner->picture_path(); ?>" style="width:100px; margin-bottom:5px">
    </div>
    <?php if(!empty($banner->image)) { ?>
    <button type="button" id="banner_image_toggle" class="btn btn-sm btn-outline-secondary mb-2">Change Image</button>
    <?php } ?>
    <div id="banner_image_wrap" style="<?php echo !empty($banner->image) ? 'display:none' : '' ?>">
        <input type="file" class="form-control image-extension" style="padding: 0" id="validationTooltip01" name="banner_image">
    </div>
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Short Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="banner[short_desc]" rows="5"><?php echo $banner->short_desc ?></textarea>
</div>
<?php }
 else {
    $current_language = $language ?? '';
    $opposite_language = ($current_language == 'English') ? 'Bengali' : 'English';
    $linkable = Banner::find_linkable($opposite_language);
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Short Title</label>
    <input type="text" class="form-control" id="validationTooltip01" name="banner[shor_title]" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title</label>
    <input type="text" class="form-control" id="validationTooltip01" name="banner[title]" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">CTA Title</label>
    <input type="text" class="form-control" id="validationTooltip01" name="banner[cta_title]" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="link_banner_id">Link with <?php echo $opposite_language ?> Banner <span class="text-muted">(shares one image)</span></label>
    <select class="form-control" id="link_banner_id" name="link_banner_id">
        <option value="">-- No link (upload own image) --</option>
        <?php foreach ($linkable as $l) { ?>
        <option value="<?php echo $l->id ?>"><?php echo substr($l->shor_title,0,60) ?></option>
        <?php } ?>
    </select>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Banner Image <span style="color:red">(Size =1920 × 700 px)</span></label>
    <div id="banner_image_wrap">
        <input type="file" class="form-control image-extension" style="padding: 0" id="validationTooltip01" name="banner_image" required="">
    </div>
    <small class="form-text text-muted" id="banner_image_hint">Pick a linked banner above instead of uploading &mdash; its image will be reused and this field will disappear.</small>
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Short Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="banner[short_desc]" rows="5" required=""></textarea>
</div>
<?php } ?>
<script>
   document.getElementsByClassName('image-extension')[0].addEventListener('change', function() {
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        const file = this.files[0];
        const fileName = file ? file.name : '';
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (file && !allowedExtensions.includes(fileExtension)) {
            alert('Invalid file format! Please upload a valid image format (jpg, jpeg, png, webp).');
            this.value = '';
        }
    });

    // "Change Image" button in edit mode reveals the upload input for an
    // already-uploaded banner (hidden by default so it isn't shown needlessly).
    (function() {
        var toggleBtn = document.getElementById('banner_image_toggle');
        var wrap = document.getElementById('banner_image_wrap');
        if (!toggleBtn || !wrap) { return; }
        toggleBtn.addEventListener('click', function() {
            wrap.style.display = (wrap.style.display === 'none') ? '' : 'none';
        });
    })();

    // When a link is chosen, its image will be reused, so the upload input
    // is hidden entirely (and no longer required) instead of just shown as optional.
    (function() {
        var linkSelect = document.getElementById('link_banner_id');
        var imageInput = document.getElementsByClassName('image-extension')[0];
        var wrap = document.getElementById('banner_image_wrap');
        var hint = document.getElementById('banner_image_hint');
        if (!linkSelect || !imageInput) { return; }
        imageInput.dataset.originallyRequired = imageInput.required ? '1' : '0';
        function syncImageField() {
            var linked = linkSelect.value !== '';
            imageInput.required = !linked && imageInput.dataset.originallyRequired === '1';
            if (wrap) { wrap.style.display = linked ? 'none' : ''; }
            if (hint) { hint.style.display = linked ? 'none' : ''; }
        }
        linkSelect.addEventListener('change', syncImageField);
        syncImageField();
    })();
</script>
