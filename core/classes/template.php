<?php

class Template
{
    public static function url($url = null): string
    {
        return URL . '/' . $url;
    }

    public static function asset($url = null): string
    {
        return URL . '/public/' . $url;
    }

    public static function error(): bool
    {
        global $error;
        return isset($error);
    }

    public static function success(): bool
    {
        global $success;
        return isset($success);
    }

    public static function cutText($str, $limit = 160): string
    {
        $str = strip_tags(htmlspecialchars_decode($str));
        $length = strlen($str);
        if ($length > $limit) {
            $str = mb_substr($str, 0, $limit, 'UTF8') . '...';
        }
        return $str;
    }
}
