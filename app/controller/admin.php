<?php
class Admin extends Controller{
    function main(): void
    {
        require_once(PATH . '/admin/index.php');
    }
    function url($url): void
    {
        extract(['url'=>$url]);
        require_once(PATH . '/admin/index.php');
    }
}
