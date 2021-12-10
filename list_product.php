<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');

include 'db_connections.php';
include 'products.php';

$databse = Database::getInstance();
$db = $databse->getConnection();
$products = new Products($db);
$result = $products->listProduct();
$numOfRows = $result->rowCount();

if ($numOfRows > 0){
    $posts_arr =array();
    $posts_arr['data'] =array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'product_id'=>$product_id,
            'cart_id'=>$cart_id,
            'product_name'=>$product_name,
            'product_description'=>$product_description,
            'product_price'=>$product_price,
            'discount'=>$discount,
            'category'=>$category
        );
        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
}
else {
    echo json_encode(
        array ('massage' => 'No record found')
    );
}