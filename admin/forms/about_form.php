<input type="hidden" name="about[id]" value="<?php echo $about->id ?>">
<input type="hidden" name="about[language]" value="<?php echo $about->language ?>">

<p class="text-muted">Editing the <strong><?php echo $about->language ?></strong> version. The Breadcrumb and About Company images are shared between English and Bengali - uploading one here updates both.</p>

<!-- 1. META -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">1. Meta</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Title <small class="text-muted">(browser tab title)</small></label>
            <input type="text" class="form-control" name="about[title]" value="<?php echo htmlspecialchars($about->title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Meta Title</label>
            <input type="text" class="form-control" name="about[meta_title]" value="<?php echo htmlspecialchars($about->meta_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Meta Description</label>
            <textarea class="form-control" rows="3" name="about[meta_description]"><?php echo htmlspecialchars($about->meta_description) ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Meta Keywords <small class="text-muted">(comma separated)</small></label>
            <textarea class="form-control" rows="3" name="about[meta_keywords]"><?php echo htmlspecialchars($about->meta_keywords) ?></textarea>
        </div>
    </div>
</fieldset>

<!-- 2. BREADCRUMB -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">2. Breadcrumb</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="about[breadcrumb_title]" value="<?php echo htmlspecialchars($about->breadcrumb_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Image</label>
            <input type="file" class="form-control-file" name="breadcrumb_image">
            <?php if (!empty($about->breadcrumb_image)): ?>
                <img src="<?php echo $about->breadcrumb_image_path(); ?>" style="width:100px; margin-top:5px" alt="breadcrumb image">
            <?php endif; ?>
        </div>
    </div>
</fieldset>

<!-- 3. MISSION / VISION -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">3. Mission / Vision</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Main Title</label>
            <input type="text" class="form-control" name="about[mv_main_title]" value="<?php echo htmlspecialchars($about->mv_main_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Description</label>
            <textarea class="form-control" rows="2" name="about[mv_description]"><?php echo htmlspecialchars($about->mv_description) ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Mission Title</label>
            <input type="text" class="form-control" name="about[mission_title]" value="<?php echo htmlspecialchars($about->mission_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Mission Description</label>
            <textarea class="form-control" rows="4" name="about[mission_description]"><?php echo htmlspecialchars($about->mission_description) ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Vision Title</label>
            <input type="text" class="form-control" name="about[vision_title]" value="<?php echo htmlspecialchars($about->vision_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Vision Description</label>
            <textarea class="form-control" rows="4" name="about[vision_description]"><?php echo htmlspecialchars($about->vision_description) ?></textarea>
        </div>
    </div>
</fieldset>

<!-- 4. ABOUT COMPANY -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">4. About Company</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Short Title</label>
            <input type="text" class="form-control" name="about[company_short_title]" value="<?php echo htmlspecialchars($about->company_short_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Main Title</label>
            <input type="text" class="form-control" name="about[company_main_title]" value="<?php echo htmlspecialchars($about->company_main_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Description</label>
            <textarea class="form-control" rows="4" name="about[company_description]"><?php echo htmlspecialchars($about->company_description) ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Image</label>
            <input type="file" class="form-control-file" name="company_image">
            <?php if (!empty($about->company_image)): ?>
                <img src="<?php echo $about->company_image_path(); ?>" style="width:100px; margin-top:5px" alt="about company image">
            <?php endif; ?>
        </div>
    </div>
</fieldset>

<!-- 5. WHY CHOOSE US -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">5. Why Choose Us <small class="text-muted">(4 cards)</small></legend>
    <div class="form-row">
        <?php for ($i = 1; $i <= 4; $i++):
            $title_field = "card{$i}_title";
            $desc_field = "card{$i}_description";
        ?>
        <div class="col-md-6 mb-3">
            <div class="border rounded p-2">
                <label class="font-weight-bold">Card <?php echo $i ?> Title</label>
                <input type="text" class="form-control mb-2" name="about[<?php echo $title_field ?>]" value="<?php echo htmlspecialchars($about->$title_field) ?>">
                <label class="font-weight-bold">Card <?php echo $i ?> Description</label>
                <textarea class="form-control" rows="3" name="about[<?php echo $desc_field ?>]"><?php echo htmlspecialchars($about->$desc_field) ?></textarea>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</fieldset>
