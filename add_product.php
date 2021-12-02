<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'db_connections.php';
include 'products.php';

$databse = Databse::getInstance();
$db = $databse->getConnection();

$products = new Products($db);
$data = json_decode(file_get_contents("php://input"));

$products->product_name=$data->product_name;
$products->product_description= $data->product_description;
$products->product_price= $data->product_price;
$products->discount= $data->discount;
$products->category= $data->category;

if ($products->addProduct()){
    echo json_encode(
        array('massage' => 'Product Inserted')
    );
}
else {
    echo json_encode(
        array('massage' => 'Failed to insert')
    );
}
?>