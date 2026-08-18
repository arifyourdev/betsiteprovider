<?php 
require_once "admin/private/initialize.php";
// session_start();  

$goback = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';  
$_SESSION['lang'] = $lang;

// Redirect back to the original page
header("Location: $goback");
exit();
?>