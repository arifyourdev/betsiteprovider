<?php

$lang = (isset($_SESSION['lang']) && $_SESSION['lang'] === 'bd') ? 'bd' : 'en';

$translations = include __DIR__ . '/lang.php';

extract($translations[$lang]);
