<?php

include 'db_connections.php';
include 'cart.php';

$database = Database::getInstance();
$db = $database->getConnection();
$cart = new Cart($db);
$result1 = $cart->showCart();
$rows = $result1->rowCount();


if ($rows > 0) {
    $post_arr = array();
    $post_arr['data'] = array();
    while ($record1 = $result1->fetch(PDO::FETCH_ASSOC)) {
        extract($record1);
        $sql2 = "select product_price,discount from products where product_name='$product_name'";
        $result2 = $db->query($sql2);
        $record2 = $result2->fetch(PDO::FETCH_ASSOC);
        $product_price = $record2['product_price'];
        $discount = $record2['discount'];

        $sql3 = "select quantity from cart where cart_name='$cart_name' and product_name='$product_name'";
        $result3 = $db->query($sql3);
        $record3 = $result3->fetch(PDO::FETCH_ASSOC);
        $quantities = $record3['quantity'];

        if ($quantities > 1) {
            $total = $quantities * $product_price;
        } else {
            $total = $product_price;
        }

        
        $sql4 = "select tax from category where category_name='$product_name'";
        $result4 = $db->query($sql4);
        $record4 = $result4->fetch(PDO::FETCH_ASSOC);
        $tax = $record4['tax'];

        $total_tax = sprintf('%.2f', $total * $tax / 100);
        $total_with_tax = sprintf('%.2f', $total + $total_tax);

        $discount = sprintf('%.2f', $total_with_tax * 10 / 100);
        $total_with_discount = sprintf('%.2f',$total_with_tax - $discount);
        $grand_total=$total_with_discount;
        
        json_encode(
            $post_item = array(
                'cart_name' => $cart_name,
                'product_name' => $product_name,
                'total' => $total,
                'discount' => $discount,
                'total_with_discount' => $total_with_discount,
                'total_tax' => $total_tax,
                'total_with_tax' => $total_with_tax,
                'grand_total'=>$grand_total
            )
        );
        array_push($post_arr['data'], $post_item);
    }
    echo json_encode($post_arr);
} else {
    echo 'Record Not Found';
}
