<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');

include 'database.php';
include 'todo_list.php';

$databse = Databse::getInstance();
$db = $databse->getConnection();

$note = new ToDoList($db);

$data = json_decode(file_get_contents("php://input"));

$note->username = $data->username;
$note->word = $data->word;

$result = $note->readByWord();


if ($result) {
    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $post_item = array(
            'username' => $username,
            'topic' => $topic,
            'description' => $description

        );

        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
} else {
    echo json_encode(
        array('massage' => 'User Does not Exists')
    );
}
