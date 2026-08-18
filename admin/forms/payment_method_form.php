<input type="hidden" name="payment_method[id]" value="<?php echo $payment_method->id ?>">
<input type="hidden" name="payment_method[language]" value="<?php echo $payment_method->language ?>">

<p class="text-muted">Editing the <strong><?php echo $payment_method->language ?></strong> version. All images on this page are shared between English and Bengali - uploading one here updates both.</p>

<ul class="nav nav-tabs mb-3" id="paymentMethodTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pm-meta-tab" data-toggle="tab" href="#pm-meta" role="tab">Meta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pm-breadcrumb-tab" data-toggle="tab" href="#pm-breadcrumb" role="tab">Breadcrumb</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pm-about-tab" data-toggle="tab" href="#pm-about" role="tab">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pm-getstarted-tab" data-toggle="tab" href="#pm-getstarted" role="tab">Get Started Section</a>
    </li>
</ul>

<div class="tab-content" id="paymentMethodTabContent">

    <!-- 1. META -->
    <div class="tab-pane fade show active" id="pm-meta" role="tabpanel">
        <fieldset class="border p-3 mb-4 w-100">
            <legend class="w-auto px-2 h6 mb-0">Meta</legend>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="payment_method[meta_title]" value="<?php echo htmlspecialchars($payment_method->meta_title) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Keywords <small class="text-muted">(comma separated)</small></label>
                    <input type="text" class="form-control" name="payment_method[meta_keywords]" value="<?php echo htmlspecialchars($payment_method->meta_keywords) ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea class="form-control" rows="3" name="payment_method[meta_description]"><?php echo htmlspecialchars($payment_method->meta_description) ?></textarea>
                </div>
            </div>
        </fieldset>
    </div>

    <!-- 2. BREADCRUMB -->
    <div class="tab-pane fade" id="pm-breadcrumb" role="tabpanel">
        <fieldset class="border p-3 mb-4 w-100">
            <legend class="w-auto px-2 h6 mb-0">Breadcrumb</legend>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="payment_method[breadcrumb_name]" value="<?php echo htmlspecialchars($payment_method->breadcrumb_name) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image <small class="text-muted">(common)</small></label>
                    <input type="file" class="form-control-file" name="breadcrumb_image">
                    <?php if (!empty($payment_method->breadcrumb_image)): ?>
                        <img src="<?php echo $payment_method->image_path('breadcrumb_image'); ?>" style="width:100px; margin-top:5px" alt="breadcrumb image">
                    <?php endif; ?>
                </div>
            </div>
        </fieldset>
    </div>

    <!-- 3. ABOUT -->
    <div class="tab-pane fade" id="pm-about" role="tabpanel">
        <fieldset class="border p-3 mb-4 w-100">
            <legend class="w-auto px-2 h6 mb-0">About</legend>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label>Short Title</label>
                    <input type="text" class="form-control" name="payment_method[about_short_title]" value="<?php echo htmlspecialchars($payment_method->about_short_title) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="payment_method[about_title]" value="<?php echo htmlspecialchars($payment_method->about_title) ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea class="form-control" rows="4" name="payment_method[about_description]"><?php echo htmlspecialchars($payment_method->about_description) ?></textarea>
                </div>
            </div>
            <hr>
            <label class="font-weight-bold mb-3">Cards <small class="text-muted">(4 cards, images common)</small></label>
            <div class="form-row">
                <?php for ($i = 1; $i <= 4; $i++):
                    $image_column = "card{$i}_image";
                    $title_field = "card{$i}_title";
                    $desc_field = "card{$i}_description";
                ?>
                <div class="col-md-6 mb-3">
                    <div class="border rounded p-2">
                        <label class="font-weight-bold">Card <?php echo $i ?> Image <small class="text-muted">(common)</small></label>
                        <input type="file" class="form-control-file mb-2" name="<?php echo $image_column ?>">
                        <?php if (!empty($payment_method->$image_column)): ?>
                            <img src="<?php echo $payment_method->image_path($image_column); ?>" style="width:100px; margin-bottom:10px" alt="card <?php echo $i ?> image">
                        <?php endif; ?>
                        <label class="font-weight-bold">Card <?php echo $i ?> Title</label>
                        <input type="text" class="form-control mb-2" name="payment_method[<?php echo $title_field ?>]" value="<?php echo htmlspecialchars($payment_method->$title_field) ?>">
                        <label class="font-weight-bold">Card <?php echo $i ?> Description</label>
                        <textarea class="form-control" rows="3" name="payment_method[<?php echo $desc_field ?>]"><?php echo htmlspecialchars($payment_method->$desc_field) ?></textarea>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </fieldset>
    </div>

    <!-- 4. GET STARTED -->
    <div class="tab-pane fade" id="pm-getstarted" role="tabpanel">
        <fieldset class="border p-3 mb-4 w-100">
            <legend class="w-auto px-2 h6 mb-0">Get Started Section</legend>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label>Short Title</label>
                    <input type="text" class="form-control" name="payment_method[getstarted_short_title]" value="<?php echo htmlspecialchars($payment_method->getstarted_short_title) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="payment_method[getstarted_title]" value="<?php echo htmlspecialchars($payment_method->getstarted_title) ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea class="form-control" rows="4" name="payment_method[getstarted_description]"><?php echo htmlspecialchars($payment_method->getstarted_description) ?></textarea>
                </div>
            </div>
        </fieldset>
    </div>

</div>
