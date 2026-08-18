<?php
if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $blog = Blog::find_by_id($id);
   $current_language = $blog->language;
   $opposite_language = ($current_language == 'English') ? 'Bengali' : 'English';
   $linkable = Blog::find_linkable($opposite_language, $blog->group_id);
   $linked_id = '';
   foreach ($linkable as $l) {
       if (!empty($blog->group_id) && $l->group_id == $blog->group_id) {
           $linked_id = $l->id;
           break;
       }
   }
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $blog->title ?>" name="blog[title]">
</div>
<input type="hidden" class="form-control" id="validationTooltip01" name="blog[language]" value="<?php echo $blog->language ?>">
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title Url</label>
    <input type="text" class="form-control" id="blog_title_url" value="<?php echo $blog->title_url ?>" name="blog[title_url]">
    <small class="form-text text-muted" id="blog_title_url_hint" style="display:none">Filled in from the linked <?php echo $opposite_language ?> blog so both open at the same URL.</small>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Author Name</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $blog->name ?>" name="blog[name]">
</div>
<div class="col-md-6 mb-3">
    <label for="link_blog_id">Link with <?php echo $opposite_language ?> Blog <span class="text-muted">(shares one image)</span></label>
    <select class="form-control" id="link_blog_id" name="link_blog_id">
        <option value="">-- No link (own image) --</option>
        <?php foreach ($linkable as $l) { ?>
        <option value="<?php echo $l->id ?>" data-title-url="<?php echo htmlspecialchars($l->title_url) ?>" <?php if($l->id == $linked_id) echo 'selected'; ?>><?php echo substr($l->title,0,60) ?></option>
        <?php } ?>
    </select>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Blog Image <span style="color:red">(Size =900 × 400 px)</span></label>
    <div>
        <img src="<?php echo $blog->picture_path(); ?>" style="width:100px; margin-bottom:5px">
    </div>
    <?php if(!empty($blog->blog_image)) { ?>
    <button type="button" id="blog_image_toggle" class="btn btn-sm btn-outline-secondary mb-2">Change Image</button>
    <?php } ?>
    <div id="blog_image_wrap" style="<?php echo !empty($blog->blog_image) ? 'display:none' : '' ?>">
        <input type="file" class="form-control image-extension" style="padding: 0" id="validationTooltip01" name="blog_image">
    </div>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Blog Image Alt </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $blog->image_alt ?>" name="blog[image_alt]">
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Blog Details</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="blog[details]" rows="5"><?php echo $blog->details ?></textarea>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Title </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $blog->page_title ?>" name="blog[page_title]">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Keywords</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $blog->meta_title ?>" name="blog[meta_title]">
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Meta Description</label>
    <textarea type="text" class="form-control" id="validationTooltip01"  name="blog[meta_detail]"><?php echo $blog->meta_detail ?></textarea>
</div>
<?php }
 else {
    $current_language = $current_language ?? '';
    $opposite_language = ($current_language == 'English') ? 'Bengali' : 'English';
    $linkable = Blog::find_linkable($opposite_language);
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title</label>
    <input type="text" class="form-control" id="validationTooltip01" name="blog[title]"  required="">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title Url</label>
    <input type="text" class="form-control" id="blog_title_url" name="blog[title_url]" required="">
    <small class="form-text text-muted" id="blog_title_url_hint" style="display:none">Filled in from the linked <?php echo $opposite_language ?> blog so both open at the same URL.</small>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Author Name</label>
    <input type="text" class="form-control" id="validationTooltip01" name="blog[name]" value="bdbetsolution" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="link_blog_id">Link with <?php echo $opposite_language ?> Blog <span class="text-muted">(shares one image)</span></label>
    <select class="form-control" id="link_blog_id" name="link_blog_id">
        <option value="">-- No link (upload own image) --</option>
        <?php foreach ($linkable as $l) { ?>
        <option value="<?php echo $l->id ?>" data-title-url="<?php echo htmlspecialchars($l->title_url) ?>"><?php echo substr($l->title,0,60) ?></option>
        <?php } ?>
    </select>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Blog Image <span style="color:red">(Size =900 × 400 px)</span></label>
    <div id="blog_image_wrap">
        <input type="file" class="form-control image-extension" style="padding: 0" id="validationTooltip01" name="blog_image" required="">
    </div>
    <small class="form-text text-muted" id="blog_image_hint">Pick a linked blog above instead of uploading &mdash; its image will be reused and this field will disappear.</small>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Blog Image Alt </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $blog->image_alt ?>" name="blog[image_alt]">
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Blog Details</label>
    <textarea class="form-control textarea-formcontrol" id="exampleFormControlTextarea1" name="blog[details]" rows="5" ></textarea>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Title </label>
    <input type="text" class="form-control" id="validationTooltip01" name="blog[page_title]" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Keywords</label>
    <input type="text" class="form-control" id="validationTooltip01" name="blog[meta_title]" required="">
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Meta Description</label>
    <textarea type="text" class="form-control" id="validationTooltip01"  name="blog[meta_detail]" required=""></textarea>
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
    // already-uploaded blog (hidden by default so it isn't shown needlessly).
    (function() {
        var toggleBtn = document.getElementById('blog_image_toggle');
        var wrap = document.getElementById('blog_image_wrap');
        if (!toggleBtn || !wrap) { return; }
        toggleBtn.addEventListener('click', function() {
            wrap.style.display = (wrap.style.display === 'none') ? '' : 'none';
        });
    })();

    // When a link is chosen, its image will be reused, so the upload input
    // is hidden entirely (and no longer required) instead of just shown as optional.
    // The Title Url is auto-filled from the linked blog (and locked while linked)
    // so both share one URL without having to type it twice.
    (function() {
        var linkSelect = document.getElementById('link_blog_id');
        var imageInput = document.getElementsByClassName('image-extension')[0];
        var wrap = document.getElementById('blog_image_wrap');
        var hint = document.getElementById('blog_image_hint');
        var titleUrlInput = document.getElementById('blog_title_url');
        var titleUrlHint = document.getElementById('blog_title_url_hint');
        if (!linkSelect || !imageInput) { return; }
        imageInput.dataset.originallyRequired = imageInput.required ? '1' : '0';
        if (titleUrlInput) { titleUrlInput.dataset.ownValue = titleUrlInput.value; }
        function syncImageField() {
            var linked = linkSelect.value !== '';
            imageInput.required = !linked && imageInput.dataset.originallyRequired === '1';
            if (wrap) { wrap.style.display = linked ? 'none' : ''; }
            if (hint) { hint.style.display = linked ? 'none' : ''; }
            if (titleUrlHint) { titleUrlHint.style.display = linked ? 'block' : 'none'; }
            if (titleUrlInput) {
                if (linked) {
                    var selectedOption = linkSelect.options[linkSelect.selectedIndex];
                    titleUrlInput.value = selectedOption.dataset.titleUrl || '';
                    titleUrlInput.readOnly = true;
                } else {
                    titleUrlInput.value = titleUrlInput.dataset.ownValue || '';
                    titleUrlInput.readOnly = false;
                }
            }
        }
        linkSelect.addEventListener('change', syncImageField);
        syncImageField();
    })();
</script>
