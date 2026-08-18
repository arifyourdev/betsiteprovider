<?php
require_once '../private/initialize.php';
require_login();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $footer_list = FooterList::find_by_id($id);

    if ($footer_list) {
        echo json_encode([
            'link_name' => $footer_list->link_name,
            'link_value' => $footer_list->link_value
        ]);
    } else {
        echo json_encode(['error' => 'Footer List not found for ID: ' . $id]);
    }
} else {
    echo json_encode(['error' => 'Invalid Footer List ID provided.']);
}

?>