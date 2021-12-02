<?php

class Databse{
    private $servername = 'localhost';
    private $db_name = 'api';
    private $username = 'root';
    private $passward = "";
    static private $conn;
    private static $instance;


    public static function getInstance(){
        self::$instance=new Static();
        return self::$instance;
    }
    
    // Database Connection

    public function getConnection () {
    
            try {

                $this->conn = new PDO('mysql:host=' . $this->servername . ';dbname='.$this->db_name,$this->username,$this->passward);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo 'Connection Failed: '. $e->getMessage();
            }
        
        
        return $this->conn;
    }
 }
