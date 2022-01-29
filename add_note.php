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

$todo_list->username = $data->username;
$todo_list->topic = $data->topic;
$todo_list->description = $data->description;
$todo_list->priority = $data->priority;

if ($data->description) {
    if ($todo_list->addNote()) {
        echo json_encode(
            array('message' => 'Note Added...')
        );
    } else {
        echo json_encode(
            array('message' => 'Failed to add note')
        );
    }
} else {
    echo json_encode(
        array('message' => 'enter description')
    );
}
