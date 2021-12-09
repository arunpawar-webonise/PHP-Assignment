<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include 'database.php';
include 'todo_list.php';

$databse = Databse::getInstance();

$db_connection = $databse->getConnection();

$note = new ToDoList($db_connection);

$data = json_decode(file_get_contents("php://input"));

$note->todo_topic = $data->todo_topic;
$note->todo_description = $data->todo_description;
$note->user_id = $data->user_id;
$note->priority = $data->priority;

if ($note->update()) {

    echo json_encode(

        array('massage' => 'note upadated')
    );
} else {
    echo json_encode(

        array('massage' => 'Note Not upadated')
    );
}