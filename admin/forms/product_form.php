<?php
if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $product = Product::find_by_id($id);
   $current_language = $product->language;
   $opposite_language = ($current_language == 'English') ? 'Bengali' : 'English';
   $linkable = Product::find_linkable($opposite_language, $product->group_id);
   $linked_id = '';
   foreach ($linkable as $l) {
       if (!empty($product->group_id) && $l->group_id == $product->group_id) {
           $linked_id = $l->id;
           break;
       }
   }
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $product->title ?>" name="product[title]">
</div>
<input type="hidden" class="form-control" id="validationTooltip01" value="<?php echo $product->language ?>" name="product[language]">
<div class="col-md-6 mb-3">
    <label for="product_title_url">Title Url</label>
    <input type="text" class="form-control" id="product_title_url" value="<?php echo $product->title_url ?>" name="product[title_url]">
</div>
<!-- <div class="col-md-6 mb-3">
    <label for="validationTooltip01">Product Name</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php //echo $product->product_name ?>" name="product[product_name]">
</div>    -->
<?php if($current_language == 'Bengali') { ?>
<div class="col-md-6 mb-3">
    <label for="link_product_id">Link with <?php echo $opposite_language ?> Product <span class="text-muted">(shares one image &amp; URL)</span></label>
    <select class="form-control" id="link_product_id" name="link_product_id">
        <option value="">-- No link (own image &amp; URL) --</option>
        <?php foreach ($linkable as $l) { ?>
        <option value="<?php echo $l->id ?>" data-title-url="<?php echo htmlspecialchars($l->title_url) ?>" <?php if($l->id == $linked_id) echo 'selected'; ?>><?php echo substr($l->title,0,60) ?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>
<div class="col-md-3 mb-3">
    <label for="validationTooltip01">Product Image <span style="color:red">(Size =900 × 400 px)</span></label>
    <div>
        <img src="<?php echo $product->picture_path(); ?>" style="width:100px; margin-bottom:5px">
    </div>
    <?php if(!empty($product->product_image)) { ?>
    <button type="button" id="product_image_toggle" class="btn btn-sm btn-outline-secondary mb-2">Change Image</button>
    <?php } ?>
    <div id="product_image_wrap" style="<?php echo !empty($product->product_image) ? 'display:none' : '' ?>">
        <input type="file" class="form-control image-extension" style="padding: 0" id="validationTooltip01" name="product_image">
    </div>
</div>
<div class="col-md-3 mb-3">
    <label for="validationTooltip01">Product Image Alt </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $product->image_alt ?>" name="product[image_alt]"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Whitelabel Url</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $product->website_url ?>" name="product[website_url]">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Web Type</label>
    <select class="form-control" id="validationTooltip01" name="product[web_type]" required="">
        <option value="">Select Web Type</option>
        <option value="b2c-whitelabel" <?php if($product->web_type == 'b2c-whitelabel') echo 'selected'; ?>>B2C Whitelabel</option>
        <option value="b2b-whitelabel" <?php if($product->web_type == 'b2b-whitelabel') echo 'selected'; ?>>B2B Whitelabel</option>
    </select>
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Product Details</label>
    <textarea class="form-control" id="exampleFormControlTextarea1 summernote" name="product[details]" rows="5"><?php echo $product->details ?></textarea>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Title </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $product->page_title ?>" name="product[page_title]">
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Keywords</label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $product->meta_title ?>" name="product[meta_title]">
</div>  
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Meta Description</label>
    <textarea type="text" class="form-control" id="validationTooltip01"  name="product[meta_detail]"><?php echo $product->meta_detail ?></textarea>
</div> 
 
<?php }
 else {
    $current_language = $language ?? '';
    $opposite_language = ($current_language == 'English') ? 'Bengali' : 'English';
    $linkable = Product::find_linkable($opposite_language);
?>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Title</label>
    <input type="text" class="form-control" id="validationTooltip01" name="product[title]" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="product_title_url">Title Url</label>
    <input type="text" class="form-control" id="product_title_url" name="product[title_url]" required="">
</div>
<!-- <div class="col-md-6 mb-3">
    <label for="validationTooltip01">Product Name</label>
    <input type="text" class="form-control" id="validationTooltip01" name="product[product_name]"  required="">
</div>   -->
<?php if($current_language == 'Bengali') { ?>
<div class="col-md-6 mb-3">
    <label for="link_product_id">Link with <?php echo $opposite_language ?> Product <span class="text-muted">(shares one image &amp; URL)</span></label>
    <select class="form-control" id="link_product_id" name="link_product_id">
        <option value="">-- No link (upload own image &amp; URL) --</option>
        <?php foreach ($linkable as $l) { ?>
        <option value="<?php echo $l->id ?>" data-title-url="<?php echo htmlspecialchars($l->title_url) ?>"><?php echo substr($l->title,0,60) ?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>
<div class="col-md-3 mb-3">
    <label for="validationTooltip01">Product Image <span style="color:red">(Size =900 × 400 px)</span></label>
    <div id="product_image_wrap">
        <input type="file" class="form-control image-extension" style="padding: 0" id="validationTooltip01" name="product_image" required="">
    </div>
    <!-- <small class="form-text text-muted" id="product_image_hint">Pick a linked product above instead of uploading &mdash; its image will be reused and this field will disappear.</small> -->
</div>
<div class="col-md-3 mb-3">
    <label for="validationTooltip01">Product Image Alt </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $product->image_alt ?>" name="product[image_alt]"> 
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Whitelabel Url</label>
    <input type="text" class="form-control" id="validationTooltip01"  name="product[website_url]" required="">
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Web Type</label>
    <select class="form-control" id="validationTooltip01" name="product[web_type]" required="">
        <option value="">Select Web Type</option>
        <option value="b2c-whitelabel">B2C Whitelabel</option>
        <option value="b2b-whitelabel">B2B Whitelabel</option>
    </select>
</div>
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Product Details</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="product[details]"></textarea>
</div>
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Title </label>
    <input type="text" class="form-control" id="validationTooltip01" name="product[page_title]" required="">
</div> 
<div class="col-md-6 mb-3">
    <label for="validationTooltip01">Meta Keywords</label>
    <input type="text" class="form-control" id="validationTooltip01" name="product[meta_title]" required="">
</div>  
<div class="col-md-12 mb-3">
    <label for="validationTooltip01">Meta Description</label>
    <textarea type="text" class="form-control" id="validationTooltip01"  name="product[meta_detail]" required=""></textarea>
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
    // already-uploaded product (hidden by default so it isn't shown needlessly).
    (function() {
        var toggleBtn = document.getElementById('product_image_toggle');
        var wrap = document.getElementById('product_image_wrap');
        if (!toggleBtn || !wrap) { return; }
        toggleBtn.addEventListener('click', function() {
            wrap.style.display = (wrap.style.display === 'none') ? '' : 'none';
        });
    })();

    // When a link is chosen, its image will be reused, so the upload input
    // is hidden entirely (and no longer required) instead of just shown as optional.
    (function() {
        var linkSelect = document.getElementById('link_product_id');
        var imageInput = document.getElementsByClassName('image-extension')[0];
        var wrap = document.getElementById('product_image_wrap');
        var hint = document.getElementById('product_image_hint');
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

    // When a link is chosen, its Title Url will be reused, so the field is
    // filled from the linked product and locked (server also enforces this).
    (function() {
        var linkSelect = document.getElementById('link_product_id');
        var urlInput = document.getElementById('product_title_url');
        if (!linkSelect || !urlInput) { return; }
        urlInput.dataset.ownValue = urlInput.value;
        urlInput.dataset.originallyRequired = urlInput.required ? '1' : '0';
        function syncTitleUrlField() {
            var option = linkSelect.options[linkSelect.selectedIndex];
            var linked = linkSelect.value !== '';
            if (linked) {
                urlInput.value = option.getAttribute('data-title-url') || '';
                urlInput.readOnly = true;
                urlInput.required = false;
            } else {
                urlInput.value = urlInput.dataset.ownValue;
                urlInput.readOnly = false;
                urlInput.required = urlInput.dataset.originallyRequired === '1';
            }
        }
        linkSelect.addEventListener('change', syncTitleUrlField);
        syncTitleUrlField();
    })();

    // Auto-fill Title Url from Title as the user types, until the user edits
    // Title Url by hand (or it's already got a value, e.g. when editing) -
    // at which point auto-fill stops so it never clobbers a deliberate value.
    (function() {
        var titleInput = document.querySelector('input[name="product[title]"]');
        var urlInput = document.getElementById('product_title_url');
        if (!titleInput || !urlInput) { return; }

        var urlManuallyEdited = urlInput.value.trim() !== '';

        function slugify(text) {
            return text.toString().toLowerCase().trim()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        urlInput.addEventListener('input', function() {
            urlManuallyEdited = true;
        });

        titleInput.addEventListener('input', function() {
            if (urlInput.readOnly || urlManuallyEdited) { return; }
            urlInput.value = slugify(titleInput.value);
        });
    })();
</script>