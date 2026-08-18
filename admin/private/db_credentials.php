<?php

//Keep database credentials in a separate file_exists
//1. Easy to exclude this file from source code managers

// TODO: update these with the live server's MySQL credentials before going live.
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "betsiteprovider");

// define("DB_SERVER", "localhost");
// define("DB_USER", "BDbets");
// define("DB_PASS", "Bdbet$@2025$");
// define("DB_NAME", "bdbets");


date_default_timezone_set("Asia/Kolkata");
$time = date('Y-m-d H:i:s');