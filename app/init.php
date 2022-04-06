<?php
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');

spl_autoload_register(function ($className){
    require __DIR__ . '/classes/' . strtolower($className) . '.php';
});

foreach (glob(__DIR__ . '/helpers/*.php') as $helperFile) {
    require $helperFile;
}
require __DIR__ . '/settings.php';
$config = require __DIR__ . '/config.php';
require __DIR__ . '/web.php';
