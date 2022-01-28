<?php
class Cart
{


    public $cart_name;
    public $product_name;

    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createCart()
    {
        $sql3 = "select * from cart";
        $result3 = $this->conn->query($sql3);
        $rows = $result3->rowCount();
        $count = 0;
        while ($record3 = $result3->fetch(PDO::FETCH_ASSOC)) {
            if ($record3['cart_name'] == $this->cart_name) {
            } else {
                $count++;
            }
        }
        if ($rows == $count) {
            $sql3 = "INSERT INTO `cart`(`cart_name`) VALUES ('$this->cart_name')";
            $result3 = $this->conn->query($sql3);
            if ($result3) {
                return true;
            } else {
                return false;
            }
        } else {
            echo 'Cart ' . $this->cart_name . ' Already Available';
            die();
        }
    }

    public function deleteCart()
    {
        $sqlQuery = "DELETE FROM `cart` WHERE cart_name='$this->cart_name'";
        $result = $this->conn->query($sqlQuery);
        if ($result->rowCount() > 0) {

            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            echo 'Cart ' . $this->cart_name . ' is not Available';
            die();
        }
        
    }

    public function addProduct()
    {

        $sql1 = "select * from cart where cart_name='$this->cart_name'";
        $result1 = $this->conn->query($sql1);
        $rows = $result1->rowCount();
        $count = 0;
        if ($rows > 0) {
            $sql2 = "select * from products where product_name='$this->product_name'";
            $result2 = $this->conn->query($sql2);
            $record2 = $result2->fetch(PDO::FETCH_ASSOC);
            if ($result2->rowCount() > 0) {
                while ($record1 = $result1->fetch(PDO::FETCH_ASSOC)) {
                    if ($record1['cart_name'] == $this->cart_name && $record1['product_name'] == '') {
                        $product_price = $record2['product_price'];
                        $total = $product_price * 1;

                        $sql6 = "select tax from category where category_name='$this->product_name'";
                        $result6 = $this->conn->query($sql6);
                        $record6 = $result6->fetch(PDO::FETCH_ASSOC);
                        $tax = $record6['tax'];
                        $total_tax = $total * $tax / 100;
                        $total_with_tax = $total_tax + $total;

                        $discount = $record2['discount'];
                        $total_discount = $total_with_tax * $discount / 100;
                        $total_with_discount = $total_with_tax - $total_discount;

                        $grand_total = $total_with_discount;

                        $sql5 = "update cart set product_name='$this->product_name', quantity=1,total=$total,total_tax=$total_tax,total_with_tax=$total_with_tax,total_discount=$total_discount,total_discount=$total_discount,total_with_discount=$total_with_discount,grand_total=$grand_total where cart_name='$this->cart_name' and product_name=''";

                        $result5 = $this->conn->query($sql5);
                        if ($result5) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                    if ($record1['cart_name'] == $this->cart_name && $record1['product_name'] == $this->product_name) {
                        $quantity = $record1['quantity'];
                        $quantity += 1;

                        $product_price = $record2['product_price'];
                        $total = $product_price * $quantity;

                        $sql6 = "select tax from category where category_name='$this->product_name'";
                        $result6 = $this->conn->query($sql6);
                        $record6 = $result6->fetch(PDO::FETCH_ASSOC);
                        $tax = $record6['tax'];
                        $total_tax = $total * $tax / 100;
                        $total_with_tax = $total_tax + $total;

                        $discount = $record2['discount'];
                        $total_discount = $total_with_tax * $discount / 100;
                        $total_with_discount = $total_with_tax - $total_discount;

                        $grand_total = $total_with_discount;

                        $sql2 = "update cart set quantity=$quantity,total=$total,total_tax=$total_tax,total_with_tax=$total_with_tax,total_discount=$total_discount,total_discount=$total_discount,total_with_discount=$total_with_discount,grand_total=$grand_total where cart_name='$this->cart_name' and product_name='$this->product_name'";
                        $result2 = $this->conn->query($sql2);

                        if ($result2) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        $count++;
                    }
                }
                if ($rows == $count) {
                    $sql3 = "select quantity from cart where cart_name='$this->cart_name' and product_name='$this->product_name'";
                    $result3 = $this->conn->query($sql3);
                    $record3 = $result3->fetch(PDO::FETCH_ASSOC);
                    $quantity = $record3['quantity'];
                    $quantity += 1;
                    $sql4 = "INSERT INTO `cart`(`cart_name`, `product_name`, `quantity`) VALUES ('$this->cart_name','$this->product_name',$quantity) ";
                    $result4 = $this->conn->query($sql4);
                    if ($result4) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                die('Product ' . $this->product_name . ' is Not Available');
            }
        } else {
            echo 'Cart ' . $this->cart_name . ' is not Available';
        }
    }



    public function deleteProduct()
    {
        $sql1 = "SELECT quantity FROM `cart` where cart_name='$this->cart_name' and product_name='$this->product_name'";
        $result1 = $this->conn->query($sql1);
        $record1 = $result1->fetch(PDO::FETCH_ASSOC);
        $quantity = $record1['quantity'];


        if ($quantity > 0) {
            $quantity -= 1;
            $sql2 = "update cart set quantity=$quantity where cart_name='$this->cart_name' and product_name='$this->product_name'";
            $result2 = $this->conn->query($sql2);

            $sql2 = "select * from products where product_name='$this->product_name'";
            $result2 = $this->conn->query($sql2);
            $record2 = $result2->fetch(PDO::FETCH_ASSOC);
            $product_price = $record2['product_price'];
            $total = $product_price * $quantity;

            $sql6 = "select tax from category where category_name='$this->product_name'";
            $result6 = $this->conn->query($sql6);
            $record6 = $result6->fetch(PDO::FETCH_ASSOC);
            $tax = $record6['tax'];
            $total_tax = $total * $tax / 100;
            $total_with_tax = $total_tax + $total;

            $discount = $record2['discount'];
            $total_discount = $total_with_tax * $discount / 100;
            $total_with_discount = $total_with_tax - $total_discount;

            $grand_total = $total_with_discount;

            $sql2 = "update cart set quantity=$quantity,total=$total,total_tax=$total_tax,total_with_tax=$total_with_tax,total_discount=$total_discount,total_discount=$total_discount,total_with_discount=$total_with_discount,grand_total=$grand_total where cart_name='$this->cart_name' and product_name='$this->product_name'";
            $result2 = $this->conn->query($sql2);

            if ($quantity == 0) {
                $sql3 = "update cart set product_name='' where  quantity=0";
                $result3 = $this->conn->query($sql3);
            }
            if ($result2) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "Product Not Available in Cart";
            die();
        }
    }
    public function showCart()
    {

        $sql1 = "select * from cart";
        $result1 = $this->conn->query($sql1);
        return $result1;
    }
    public function cartTotal()
    {
        $sql1 = "select * from cart";
        $result1 = $this->conn->query($sql1);
        return $result1;
    }
    public function cartTotalDiscount()
    {
        $sql1 = "select * from cart";
        $result1 = $this->conn->query($sql1);
        return $result1;
    }
    public function cartTotalTax()
    {
        $sql1 = "select * from cart";
        $result1 = $this->conn->query($sql1);
        return $result1;
    }
}
