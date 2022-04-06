<?php


class database
{

    protected $db;
    public function __construct()
    {
        global $config;
        try {
            $this->db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['pass']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
