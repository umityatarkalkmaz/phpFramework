<?php

class main extends Controller
{
    public function index()
    {
        $data = self::model('blog')->allDemo();
        self::view('main', $data);
    }
}
