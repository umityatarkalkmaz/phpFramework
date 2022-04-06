<?php

class main extends controller
{
    public function index(){
        $data = [
            'username' => 'Ümit Yatarkalkmaz',
            'title' => 'patron'
        ];
        self::view('main',$data);
    }
}