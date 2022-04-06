<?php
define('PATH', realpath('.'));
define('URL', '//' . $_SERVER['SERVER_NAME']);

return [
    'db' => [
        'host' => 'localhost',
        'name' => 'framework',
        'user' => 'root',
        'pass' => 'root'
    ]
];
