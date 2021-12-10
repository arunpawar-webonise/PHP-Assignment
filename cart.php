<?php
class Cart
{
    public $cart_id;
    public $cart_name;
    public $product_id;
    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createCart()
    {
        $sqlQuery = "INSERT INTO `cart`(cart_id, `cart_name`) VALUES ('$this->cart_id','$this->cart_name')";
        $result = $this->conn->query($sqlQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCart()
    {
        $sqlQuery = "DELETE FROM `cart` WHERE cart_id=$this->cart_id";
        $result = $this->conn->query($sqlQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function addProduct()
    {
        $sqlQuery="INSERT INTO `add_to_cart` (`cart_id`, `product_id`) VALUES ('$this->cart_id','$this->product_id');";
        $result=$this->conn->query($sqlQuery);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteProduct()
    {
        $sqlQuery="delete from `add_to_cart` where cart_id=$this->cart_id";
        $result=$this->conn->query($sqlQuery);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
