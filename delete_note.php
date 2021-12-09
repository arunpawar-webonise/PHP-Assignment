<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'database.php';
include 'todo_list.php';

$databse = Databse::getInstance();

$db = $databse->getConnection();

$todo_list = new ToDoList($db);

$data = json_decode(file_get_contents("php://input"));

$todo_list->user_id= $data->user_id;
$todo_list->priority=$data->priority;

if ($todo_list->delete()){

    echo json_encode(
        array('Deleted')
    );

}
else {
    echo json_encode(
        array('Failed to delete')
    );
} 