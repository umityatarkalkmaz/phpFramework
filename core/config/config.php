<?php
define('PATH', realpath('.'));
define('URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME']);
date_default_timezone_set('Europe/Istanbul');
const DEVELOP = true;
