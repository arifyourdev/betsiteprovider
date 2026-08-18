<?php
require_once '../private/initialize.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the ID from the POST data
    $id = $_POST['footer']['id'];
    
    // Find the footer by ID
    $footer = FooterList::find_by_id($id);

    if ($footer) {
        // Merge attributes and save
        $args = $_POST['footer'];
        $footer->merge_attributes($args);
        $result = $footer->save();

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Failed to update footer.']);
        }
    } else {
        echo json_encode(['error' => 'Footer not found for ID: ' . $id]);
    }
}

?>