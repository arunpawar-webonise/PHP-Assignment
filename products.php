<?php

class Products
{

    private $conn;
    public $cart_id;
    public $product_name;
    public $product_description;
    public $product_price;
    public $discount;
    public $category;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addProduct()
    {
        $sqlQuery1 = "select * from category";
        $result1 = $this->conn->query($sqlQuery1);
        $records = $result1->rowCount();
        $count = 0;
        $categories = array();

        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {

            if ($this->category == $row['category_name']) {

                $sqlQuery2 = "INSERT INTO `products`( `product_name`, `product_description`, `product_price`, `discount`, `category`) VALUES ('$this->product_name','$this->product_description','$this->product_price','$this->discount','$this->category')";

                $record2 = $this->conn->query($sqlQuery2);
                if ($record2) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $count++;
            }
        }


        if ($count == $records) {

            die('Please enter valid Category');
            
        }
    }

    public function updateProduct()
    {

        $sql1 = "select product_name from products where product_name='$this->product_name'";
        $result1 = $this->conn->query($sql1);
        if ($result1->rowCount() > 0) {

            $sqlQuery = "UPDATE `products` SET `product_name`='$this->product_name',`product_description`='$this->product_description',`product_price`='$this->product_price',`discount`='$this->discount' WHERE product_name='$this->product_name';";

            $result = $this->conn->query($sqlQuery);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            die('Product ' . $this->product_name . ' is not Available');
        }
    }

    public function deleteProduct()
    {
        $sql1 = "select product_name from products where product_name='$this->product_name'";
        $result1 = $this->conn->query($sql1);
        if ($result1->rowCount() > 0) {

            $sqlQuery = "DELETE FROM `products` WHERE product_name='$this->product_name'";
            $result = $this->conn->query($sqlQuery);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            die('Product ' . $this->product_name . ' is not Available');
        }
    }


    public function listProduct()
    {
        $sqlQuery = "SELECT * FROM `products`";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }
}
