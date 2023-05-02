<?php

class StringHelper
{
    public static function cleanString($str): string
    {
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        $str = preg_replace('/-+/', '-', $str);
        $str = preg_replace('/\.{2,}/', '.', $str);
        $str = trim($str, '-');
        return strtolower($str);
    }


}
