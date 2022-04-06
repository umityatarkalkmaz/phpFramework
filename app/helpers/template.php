<?php

function site_url($url = false): string
{
    return URL . '/' . $url;
}

function public_url($url = false): string
{
    return URL . '/public/' . setting('theme') . '/' . $url;
}

function error()
{
    global $error;
    return $error ?? false;
}

function success()
{
    global $success;
    return $success ?? false;
}

function cut_text($str, $limit = 160): string
{
    $str = strip_tags(htmlspecialchars_decode($str));
    $length = strlen($str);
    if ($length > $limit) {
        $str = mb_substr($str, 0, $limit, 'UTF8') . '...';
    }
    return $str;
}
