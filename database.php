<?php
class Databse
{

    private $host = 'localhost';
    private $db_name = 'api';
    private $username = 'root';
    private $passward = "";
    private $conn;
    private static $instance = null;

    public static function getInstance()
    {
        if(self::$instance==null){
            self::$instance = new Databse();
            return self::$instance;
        }
        return self::$instance;
    }

    public function getConnection()
    {
        try {

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->passward);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
