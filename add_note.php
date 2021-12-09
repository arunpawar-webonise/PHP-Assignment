<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'database.php';
include 'todo_list.php';

$databse = Databse::getInstance();

$db = $databse->getConnection();

$todo_list = new ToDoList($db);

$data = json_decode(file_get_contents("php://input"));

$todo_list->todo_topic = $data->todo_topic;
$todo_list->todo_description = $data->todo_description;
$todo_list->user_id = $data->user_id;
$todo_list->priority = $data->priority;

if($data->todo_description){
    if ($todo_list->addNote()) {
        echo json_encode(
            array('Note Added...')
        );
    } else {
        echo json_encode(
            array( 'Failed to add note')
        );
    }
}
else{
    echo json_encode(
        array('enter description')
    );
}

