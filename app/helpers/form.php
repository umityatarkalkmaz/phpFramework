<?php

function post($name)
{
    if (isset($_POST[$name])) {
        if (is_array($_POST[$name]))
            return array_map(function ($item) {
                return htmlspecialchars(trim($item), ENT_QUOTES);
            }, $_POST[$name]);
        return htmlspecialchars(trim($_POST[$name]), ENT_QUOTES);
    }
}

function get($name)
{
    if (isset($_GET[$name])) {
        if (is_array($_GET[$name]))
            return array_map(function ($item) {
                return htmlspecialchars(trim($item), ENT_QUOTES);
            }, $_GET[$name]);
        return htmlspecialchars(trim($_GET[$name]), ENT_QUOTES);
    }
}
function setting($name)
{
    global $settings;
    return $settings[$name] ?? false;
}

function session($name)
{
    return $_SESSION[$name] ?? false;
}

/**
 * @param ...$except_these
 * @return array|false
 * Form elemanlarının doluluğunu kontrol eder.
 * false dönerse bilinki bir eleman boş tur.
 */
function form_control(...$except_these)
{
    unset($_POST['submit']);
    $data = [];
    $error = false;
    foreach ($_POST as $key => $value) {
        if (!in_array($key, $except_these) && !post($key)) {
            $error = true;
        } else {
            $data[$key] = post($key);
        }
    }
    if ($error) {
        return false;
    }
    return $data;
}

function isAjaxRequest(): bool
{
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
