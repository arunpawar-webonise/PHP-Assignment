<?php
class ToDoList
{
    private $conn;
    public $id;
    public $username;
    public $topic;
    public $description;
    public $priority;
    public $word;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addNote()
    {
        $query1 = "select username from todo_list where username='$this->username'";
        $result1 = $this->conn->query($query1);

        $rows = $result1->rowCount();
        date_default_timezone_set('Asia/Kolkata');
        $created_at = date('Y-m-d h:i:s');

        if ($rows > 0) {
            if ($this->priority == 0) {
                echo json_encode(
                    array('message' => 'priority should not be 0')
                );
                die();
            }

            $sql2 = "select topic,description,priority from todo_list where username='$this->username'";
            $result2 = $this->conn->query($sql2);

            while ($record2 = $result2->fetch(PDO::FETCH_ASSOC)) {
                if ($record2['topic'] == $this->topic && $record2['description'] == $this->description) {
                    echo json_encode(
                        array('message' => "User Available with same topic and description")
                    );
                    die();
                }

                if ($record2['priority'] == 0) {
                    $query = "UPDATE `todo_list` SET `topic`='$this->topic',`description`='$this->description',`updated_at`='$created_at',`priority`=$this->priority WHERE username='$this->username'";

                    $stmt = $this->conn->prepare($query);

                    if ($stmt->execute()) {

                        return true;
                    } else {
                        return false;
                    }
                }
            }

            $query = "INSERT INTO `todo_list`(`username`, `topic`, `description`, `created_at`, `updated_at`, `priority`) VALUES ('$this->username','$this->topic','$this->description','$created_at','',$this->priority)";

            $stmt = $this->conn->prepare($query);

            if ($stmt->execute()) {

                return true;
            } else {
                return false;
            }
        } else {
            echo json_encode(
                array(
                    'message' => 'User Does not exist'
                )
            );
            die();
        }
    }

    public function update()
    {
        $query1 = "select id from todo_list where id=$this->id";
        $result1 = $this->conn->query($query1);

        $rows = $result1->rowCount();

        if ($rows > 0) {
            if ($this->priority == 0) {
                echo json_encode(
                    array('message' => 'priority should not be 0')
                );
                die();
            }
            if ($this->description == '') {
                echo json_encode(
                    array('message' => 'enter description')
                );
                die();
            }
            date_default_timezone_set('Asia/Kolkata');
            $updated_at = date('Y-m-d h:i:s');
            $query2 = "UPDATE `todo_list` SET `topic`='$this->topic',`description`='$this->description',`updated_at`='$updated_at',`priority`=$this->priority WHERE id='$this->id'";

            $stmt = $this->conn->prepare($query2);

            if ($stmt->execute()) {

                return true;
            } else {

                return false;
            }
        } else {
            echo json_encode(
                array(
                    'message' => 'User Does not exist'
                )
            );
            die();
        }
    }

    public function delete()
    {

        $query1 = "select id from todo_list where id=$this->id";
        $result1 = $this->conn->query($query1);
        $rows = $result1->rowCount();

        if ($rows > 0) {
            $query2 = "delete from todo_list where id=$this->id";
            $stmt = $this->conn->prepare($query2);

            if ($stmt->execute()) {
                return true;
            } else {

                return false;
            }
        } else {
            echo json_encode(
                array(
                    'message' => 'User Does not Exist'
                )
            );
            die();
        }
    }



    public function readByWord()
    {

        $query1 = "select username from todo_list where username='$this->username'";
        $result1 = $this->conn->query($query1);

        $rows = $result1->rowCount();
        if ($rows > 0) {
            $query = "SELECT * FROM `todo_list` WHERE description like '%$this->word%' and username='$this->username'";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } else {
            return false;
        }
    }


    public function readall()
    {
        $query = "SELECT * FROM todo_list";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_specific_user_notes()
    {
        $query = "SELECT * FROM todo_list where username='$this->username'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->rowCount();
        return $stmt;
    }
}
