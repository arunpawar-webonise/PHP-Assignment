<?php
header('Access-Control-Allow-Origin: *');
header('Content-tyoe: application/json');

include 'database.php';
include 'todo_list.php';

$databse = Databse::getInstance();
$db = $databse->getConnection();


$note = new ToDoList($db);

json_decode(file_get_contents("php://input"));


$result = $note->readall();

$num = $result->rowCount();

if ($num > 0) {

    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $post_item = array(
            'username'=>$username,
            'topic' => $topic,
            'description' => $description,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
            'priority' => $priority
        );

        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
} else {
    echo json_encode(
        array('message'=>'No record found')
    );
}
