<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'db_connections.php';
include 'cart.php';

$databse = Database::getInstance();
$db = $databse->getConnection();

$cart=new Cart($db);

$data = json_decode(file_get_contents("php://input"));

$cart->cart_id=$data->cart_id;
$cart->product_id=$data->product_id;

if($cart->addProduct()){
    echo json_encode('product added to cart');
}
else{
    echo json_encode('failed to add product');
}