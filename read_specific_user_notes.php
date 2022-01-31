<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');

include 'database.php';
include 'todo_list.php';

$databse = Databse::getInstance();
$db = $databse->getConnection();


$todo_list = new ToDoList($db);


$data = json_decode(file_get_contents("php://input"));

$todo_list->username = $data->username;


$result = $todo_list->read_specific_user_notes();

 $num = $result->rowCount();

if ($num > 0) {

    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'username' => $username,
            'topic' => $topic,
            'description' => $description,
            
        );

        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
} else {
    echo json_encode(
        array('message' => 'User Does not Exists')
    );
}
