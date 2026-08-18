<?php
require_once '../private/initialize.php';
require_login();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $inquiry = Inquiry::find_by_id($id);

    if ($inquiry) {
        echo '
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" class="form-control" value="' . htmlentities($inquiry->name) . '" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="text" class="form-control" value="' . htmlentities($inquiry->email) . '" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Subject</label>
                <input type="text" class="form-control" value="' . htmlentities($inquiry->subject) . '" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Contact</label>
                <input type="text" class="form-control" value="' . htmlentities($inquiry->contact) . '" readonly>
            </div>
            <div class="col-md-12 mb-3">
                <label>Message</label>
                <textarea class="form-control" rows="5" readonly>' . htmlentities($inquiry->message) . '</textarea>
            </div>
            </div>
        ';
    } else {
        echo '<p>Inquiry not found.</p>';
    }
} else {
    echo '<p>Invalid inquiry ID.</p>';
}
?>
