<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'db_connections.php';
include 'categories.php';

$databse = Databse::getInstance();

$db = $databse->getConnection();
$categories = new Categories($db);
$data = json_decode(file_get_contents("php://input"));
$categories->category_name= $data->category_name;
$categories->description= $data->description;
$categories->tax= $data->tax;
if ($categories->addCategory()){
    echo json_encode(
        array('massage' => 'Record Inserted')
    );
}
else {
    echo json_encode(
        array('massage' => 'Failed to insert')
    );
}