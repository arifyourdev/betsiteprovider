<?php
require_once '../private/initialize.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = $_POST['footer'];
    $footer = new FooterList($args);
    $result = $footer->save();

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => join(', ', $footer->errors)]);
    }
}

?>
