<?php

class Products{

    private $conn;
    public $product_name;
    public $product_description;
    public $product_price;
    public $discount;
    public $category;
    
    public function __construct($db){
        $this->conn = $db;
    
    }
    
    public function addProduct(){
        $sqlQuery = "INSERT INTO `products`(`product_name`, `product_description`, `product_price`, `discount`, `category`) VALUES ('$this->product_name','$this->product_description','$this->product_price','$this->discount','$this->category')";

        $record = $this->conn->query($sqlQuery);
        if ($record){
            return true;
        }
        else {
            return false;
        }
       }

      public function updateProduct(){
       $sqlQuery="UPDATE `products` SET `product_name`='$this->product_name',`product_description`='$this->product_description',`product_price`='$this->product_price',`discount`='$this->discount',`category`='$this->category' WHERE `product_name`='$this->product_name'";

       $result = $this->conn->query($sqlQuery);
       if ($result){
           return true;
       }
       else {
           return false;
       }
      }

      public function deleteProduct(){
       $sqlQuery="DELETE FROM `products` WHERE product_name='$this->product_name'";
       $result = $this->conn->query($sqlQuery);
       if ($result){
           return true;
       }
       else {
           return false;
       }
      }


    public function listProduct(){
        $sqlQuery = "SELECT * FROM `products`";
        $result = $this->conn->query($sqlQuery);
        return $result;
       }
}





?>