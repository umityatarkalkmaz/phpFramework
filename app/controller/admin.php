<?php

class admin extends Controller
{
    public function index()
    {
        require_once(PATH . '/admin/index.php');
    }
    public function login()
    {
        self::view('login');
    }
}
