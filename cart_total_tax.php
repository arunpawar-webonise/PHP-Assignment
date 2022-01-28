<?php
include 'db_connections.php';
include 'cart.php';

$database=Database::getInstance();
$db=$database->getConnection();
$cart=new Cart($db);

$result1=$cart->cartTotalTax();
$result_arr=array();
$result_arr['data']=array();
while($record1=$result1->fetch(PDO::FETCH_ASSOC)){
    extract($record1);
    $temp_arr=array(
        'cart_name'=>$cart_name,
        'product_name'=>$product_name,
        'total_tax'=>$total_tax
    
    );
    array_push($result_arr['data'],$temp_arr);
    
}
echo json_encode(
    array($result_arr)
);
