<?php
require __DIR__ . '/config/config.php';
$settingsFile = __DIR__ . '/config/settings.php';
if(is_file($settingsFile)) require $settingsFile;
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/classes/' . strtolower($className) . '.php';
    if (file_exists($file)) {
        require $file;
    }
    // else{
    //    require_once(PATH.'/vendor/autoload.php'); // Require Composer
    // }
});

// foreach (glob(__DIR__ . '/helpers/*.php') as $helper) {
//     require $helper; // require all helper function in helpers folder
// }

if (DEVELOP) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
require PATH . '/app/web.php';
