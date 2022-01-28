<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'db_connections.php';
include 'products.php';

$databse = Database::getInstance();
$db = $databse->getConnection();

$products = new Products($db);

$data = json_decode(file_get_contents("php://input"));

$products->product_name=$data->product_name;


if ($products->deleteProduct()){
    echo json_encode(
        array('massage' => 'Product Deleted')
    );
}
else {
    echo json_encode(
        array('massage' => 'Failed to delete')
    );
}

