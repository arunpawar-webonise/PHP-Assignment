<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'db_connections.php';
include 'cart.php';

$databse = Database::getInstance();
$db = $databse->getConnection();

$cart = new Cart($db);

$data = json_decode(file_get_contents("php://input"));

$cart->cart_name = $data->cart_name;
$cart->product_name = $data->product_name;


if ($cart->deleteProduct()) {
    echo json_encode('product deleted from cart');
} else {
    echo json_encode('failed to delete product');
}
