<?php

class Database
{
    private static string $host = 'localhost';
    private static string $dbName = 'framework';
    private static string $user = 'root';
    private static string $pass = '';
    protected PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . database::$host . ';dbname=' . database::$dbName . ' ', database::$user, database::$pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
