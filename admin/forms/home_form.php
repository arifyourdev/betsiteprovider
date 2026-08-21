<input type="hidden" name="home[id]" value="<?php echo $home->id ?>">
<input type="hidden" name="home[language]" value="<?php echo $home->language ?>">

<p class="text-muted">Editing the <strong><?php echo $home->language ?></strong> version. The About and FAQ images are shared between English and Bengali - uploading one here updates both.</p>

<!-- 1. META -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">1. Meta</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Meta Title</label>
            <input type="text" class="form-control" name="home[meta_title]" value="<?php echo htmlspecialchars($home->meta_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Meta Keywords <small class="text-muted">(comma separated)</small></label>
            <textarea class="form-control" rows="3" name="home[meta_keywords]"><?php echo htmlspecialchars($home->meta_keywords) ?></textarea>
        </div>
        <div class="col-md-12 mb-3">
            <label>Meta Description</label>
            <textarea class="form-control" rows="3" name="home[meta_description]"><?php echo htmlspecialchars($home->meta_description) ?></textarea>
        </div>
    </div>
</fieldset>

<!-- 2. ABOUT US -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">2. About Us</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Short Title</label>
            <input type="text" class="form-control" name="home[about_short_title]" value="<?php echo htmlspecialchars($home->about_short_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="home[about_title]" value="<?php echo htmlspecialchars($home->about_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Description</label>
            <textarea class="form-control" rows="4" name="home[about_description]"><?php echo htmlspecialchars($home->about_description) ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Image <small class="text-muted">(shared by both languages)</small></label>
            <input type="file" class="form-control-file" name="about_image">
            <?php if (!empty($home->about_image)): ?>
                <img src="<?php echo str_replace('\\', '/', $home->image_path('about_image')); ?>" style="width:100px; margin-top:5px" alt="about image">
            <?php endif; ?>
        </div>
        <?php for ($i = 1; $i <= 4; $i++):
            $li_field = "about_li{$i}";
        ?>
        <div class="col-md-6 mb-3">
            <label>List Item <?php echo $i ?> Text</label>
            <input type="text" class="form-control" name="home[<?php echo $li_field ?>]" value="<?php echo htmlspecialchars($home->$li_field) ?>">
        </div>
        <?php endfor; ?>
    </div>
</fieldset>

<!-- 5. NEWSLETTER -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">5. Newsletter</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Short Title</label>
            <input type="text" class="form-control" name="home[newsletter_short_title]" value="<?php echo htmlspecialchars($home->newsletter_short_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="home[newsletter_title]" value="<?php echo htmlspecialchars($home->newsletter_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Button Name</label>
            <input type="text" class="form-control" name="home[newsletter_button_name]" value="<?php echo htmlspecialchars($home->newsletter_button_name) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Image <span style="color:red">(Size = 1100 &times; 430 px)</span> <small class="text-muted">(shared by both languages)</small></label>
            <input type="file" class="form-control-file" name="newsletter_image">
            <?php if (!empty($home->newsletter_image)): ?>
                <img src="<?php echo str_replace('\\', '/', $home->image_path('newsletter_image')); ?>" style="width:100px; margin-top:5px" alt="newsletter image">
            <?php endif; ?>
        </div>
    </div>
</fieldset>

<!-- 3. HOW IT WORK -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">3. How It Work</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Short Title</label>
            <input type="text" class="form-control" name="home[how_short_title]" value="<?php echo htmlspecialchars($home->how_short_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="home[how_title]" value="<?php echo htmlspecialchars($home->how_title) ?>">
        </div>
        <div class="col-md-12 mb-3">
            <label>Description</label>
            <textarea class="form-control" rows="4" name="home[how_description]"><?php echo htmlspecialchars($home->how_description) ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label>Image <span style="color:red">(Size = 800 &times; 750 px)</span> <small class="text-muted">(shared by both languages)</small></label>
            <input type="file" class="form-control-file" name="how_image">
            <?php if (!empty($home->how_image)): ?>
                <img src="<?php echo str_replace('\\', '/', $home->image_path('how_image')); ?>" style="width:100px; margin-top:5px" alt="how it work image">
            <?php endif; ?>
        </div>
        <?php for ($i = 1; $i <= 3; $i++):
            $li_field = "how_li{$i}";
        ?>
        <div class="col-md-6 mb-3">
            <label>List Item <?php echo $i ?> Text</label>
            <input type="text" class="form-control" name="home[<?php echo $li_field ?>]" value="<?php echo htmlspecialchars($home->$li_field) ?>">
        </div>
        <?php endfor; ?>
    </div>
</fieldset>

<!-- 5. NEWSLETTER -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">5. Newsletter</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Short Title</label>
            <input type="text" class="form-control" name="home[newsletter_short_title]" value="<?php echo htmlspecialchars($home->newsletter_short_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="home[newsletter_title]" value="<?php echo htmlspecialchars($home->newsletter_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Button Name</label>
            <input type="text" class="form-control" name="home[newsletter_button_name]" value="<?php echo htmlspecialchars($home->newsletter_button_name) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Image <span style="color:red">(Size = 1100 &times; 430 px)</span> <small class="text-muted">(shared by both languages)</small></label>
            <input type="file" class="form-control-file" name="newsletter_image">
            <?php if (!empty($home->newsletter_image)): ?>
                <img src="<?php echo str_replace('\\', '/', $home->image_path('newsletter_image')); ?>" style="width:100px; margin-top:5px" alt="newsletter image">
            <?php endif; ?>
        </div>
    </div>
</fieldset>

<!-- 4. FAQS -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">4. FAQs <small class="text-muted">(5 items, single shared image)</small></legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Image <span style="color:red">(Size = 450 &times; 380 px)</span> <small class="text-muted">(shared by both languages)</small></label>
            <input type="file" class="form-control-file" name="faq_image">
            <?php if (!empty($home->faq_image)): ?>
                <img src="<?php echo str_replace('\\', '/', $home->image_path('faq_image')); ?>" style="width:100px; margin-top:5px" alt="faq image">
            <?php endif; ?>
        </div>
    </div>
    <div class="form-row">
        <?php for ($i = 1; $i <= 5; $i++):
            $title_field = "faq{$i}_title";
            $desc_field = "faq{$i}_description";
        ?>
        <div class="col-md-6 mb-3">
            <div class="border rounded p-2">
                <label class="font-weight-bold">FAQ <?php echo $i ?> Title</label>
                <input type="text" class="form-control mb-2" name="home[<?php echo $title_field ?>]" value="<?php echo htmlspecialchars($home->$title_field) ?>">
                <label class="font-weight-bold">FAQ <?php echo $i ?> Description</label>
                <textarea class="form-control" rows="3" name="home[<?php echo $desc_field ?>]"><?php echo htmlspecialchars($home->$desc_field) ?></textarea>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</fieldset>

<!-- 5. NEWSLETTER -->
<fieldset class="border p-3 mb-4 w-100">
    <legend class="w-auto px-2 h6 mb-0">5. Newsletter</legend>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Short Title</label>
            <input type="text" class="form-control" name="home[newsletter_short_title]" value="<?php echo htmlspecialchars($home->newsletter_short_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="home[newsletter_title]" value="<?php echo htmlspecialchars($home->newsletter_title) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Button Name</label>
            <input type="text" class="form-control" name="home[newsletter_button_name]" value="<?php echo htmlspecialchars($home->newsletter_button_name) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Image <span style="color:red">(Size = 1100 &times; 430 px)</span> <small class="text-muted">(shared by both languages)</small></label>
            <input type="file" class="form-control-file" name="newsletter_image">
            <?php if (!empty($home->newsletter_image)): ?>
                <img src="<?php echo str_replace('\\', '/', $home->image_path('newsletter_image')); ?>" style="width:100px; margin-top:5px" alt="newsletter image">
            <?php endif; ?>
        </div>
    </div>
</fieldset>
