<?php
class ToDoList
{
    private $conn;
    public $todo_topic;
    public $todo_description;
    public $user_id;
    public $priority;
    public $word;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addNote()
    {
        $date = date("d-m-y");

        $query = "INSERT INTO `todo_list`(`todo_topic`, `todo_description`, `insert_date`, `update_date`, `user_id`, `priority`) VALUES ('$this->todo_topic','$this->todo_description','$date','','$this->user_id','$this->priority')";

        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function update()
    {
        $date = date("d-m-y");

        $query = "UPDATE `todo_list` SET `todo_topic`='$this->todo_topic',`todo_description`='$this->todo_description',`update_date`='$date'  WHERE `user_id`='$this->user_id' and `priority`='$this->priority'";

        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function delete()
    {
        $query = "DELETE FROM `todo_list` WHERE user_id=$this->user_id and priority=$this->priority";

        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function readByWord()
    {
        $query = "SELECT * FROM `todo_list` WHERE todo_description like '%$this->word%' and user_id=$this->user_id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function readall()
    {
        $query = "SELECT * FROM todo_list";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

   
}
