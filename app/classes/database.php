<?php


class database
{

    protected $db;
    public function __construct(){
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=blog','root','root');
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}