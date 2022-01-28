<?php

class Database
{
    private $servername = 'localhost';
    private $db_name = 'api';
    private $username = 'root';
    private $passward = "";
    static private $conn;
    private static $instance;

    private function __construct()
    {
        // echo 'connected';
    }
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
            return self::$instance;
        } else {
            echo 'already connected';
        }
        return self::$instance;
    }

    // Database Connection

    public function getConnection()
    {

        try {
            $this->conn = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->db_name, $this->username, $this->passward);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Failed: ' . $e->getMessage();
        }


        return $this->conn;
    }
}
