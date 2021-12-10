<?php
class Categories
{
    private $conn;
    public $category_name;
    public $description;
    public $tax;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addCategory()
    {
        $sqlQuery = "INSERT INTO `category`(`category_name`, `description`, `tax`) VALUES ('$this->category_name','$this->description',$this->tax)";
        $result = $this->conn->query($sqlQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory()
    {
        $sqlQuery = "UPDATE `category` SET category_name='$this->category_name' ,`description`='$this->description',`tax`='$this->tax' WHERE `category_name`='$this->category_name'";
        $result = $this->conn->query($sqlQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory()
    {
        $sqlQuery = "DELETE FROM `category` WHERE category_name='$this->category_name'";
        $result = $this->conn->query($sqlQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function listCategory()
    {
        $sqlQuery = "SELECT * FROM `category`";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }
}


?>