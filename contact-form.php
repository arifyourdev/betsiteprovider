<?php
require_once "admin/private/initialize.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'Error', 'msg' => 'Invalid request.']);
    exit;
}

$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$msg   = trim($_POST['msg'] ?? '');

$name = trim($fname . ' ' . $lname);

$inquiry = new Inquiry([
    'name'    => $name,
    'email'   => $email,
    'contact' => $phone,
    'subject' => 'Contact Form Inquiry',
    'message' => $msg,
    'created_at' => date('Y-m-d H:i:s'),
]);

$result = $inquiry->save();

if ($result) {
    echo json_encode([
        'status' => 'Success',
        'msg'    => 'Thank you for reaching out! We will get back to you shortly.',
    ]);
} else {
    echo json_encode([
        'status' => 'Error',
        'msg'    => join(', ', $inquiry->errors),
    ]);
}
exit;
