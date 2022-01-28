<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');

include 'db_connections.php';
include 'categories.php';

$databse = Database::getInstance();
$db = $databse->getConnection();
$categories = new Categories($db);
$result = $categories->listCategory();
$numOfRows = $result->rowCount();

if ($numOfRows > 0){
    $posts_arr =array();
    $posts_arr['data'] =array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'category_name'=>$category_name,
            'description'=>$description,
            'tax'=>$tax.'%'
        );
        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
}
else {
    echo json_encode(
        array ('massage' => 'Category Not Added yet')
    );
}