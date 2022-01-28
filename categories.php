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
        $sql1="select * from category";
        $result1=$this->conn->query($sql1);
        while($record1=$result1->fetch(PDO::FETCH_ASSOC)){
            if($record1['category_name']==$this->category_name){
                die( 'Category '.$this->category_name.' is Already Available' );
            }
        }
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
        
        $sql1 = "select category_name from category where category_name='$this->category_name'";
        $result1 = $this->conn->query($sql1);
        if ($result1->rowCount() > 0) {

            $sqlQuery = "UPDATE `category` SET category_name='$this->category_name' ,`description`='$this->description',`tax`='$this->tax' WHERE `category_name`='$this->category_name'";
        $result = $this->conn->query($sqlQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
        }
        else{
            die('Category '. $this->category_name.' is not Available');
        }

    }

    public function deleteCategory()
    {

        $sql1 = "select category_name from category where category_name='$this->category_name'";
        $result1 = $this->conn->query($sql1);
        if ($result1->rowCount() > 0) {

            $sqlQuery = "DELETE FROM `category` WHERE category_name='$this->category_name'";
            $result = $this->conn->query($sqlQuery);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        else{
            die('Category '. $this->category_name.' is not Available');
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