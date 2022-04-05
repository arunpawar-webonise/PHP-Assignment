<?php

include 'result.php';

$data = array('smp', 'app', 'collage', 'python', 'aaaaaaaa', 'hall', 'basket', 'slack', 'oxygen', 'arun', 'hand', 'mobile', 'hangman', 'data', 'company', 'laptop');
$con;
function checkCharacter($userInput)
{

  global $data, $con;
  $arraylenght = count($data);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $count = 0;


  try {
    $con = new PDO("mysql:host=$servername;dbname=hangman", $username, $password);

    $fetchData = $con->query("select * from user where Id=1");
    $record = $fetchData->fetch(PDO::FETCH_ASSOC);

    $value = $record['name'] . $userInput;

    $updateData = $con->query("update user set name='$value' where Id=1");
    $fetchData = $con->query("select * from user where Id=1");
    $record = $fetchData->fetch(PDO::FETCH_ASSOC);
    $length = strlen($record['name']);

    for ($index = 0; $index < $arraylenght; $index++) {

      if ($record['name'] == $data[$index]) {
        echo  won();
        echo "<br><br><button><a href='hangman.php' style=text-decoration:none>Restart</a></button>";
        die();
      }

      if ($length == 8) {
        for ($index = 0; $index < $arraylenght; $index++) {
          if ($record['name'] != $data[$index]) {
            $count++;
          }
        }
        if ($arraylenght == $count) {

          echo lost();
          echo "Game Over", '<br><br>';
          echo "<button><a href='hangman.php' style=text-decoration:none>Restart</a></button>";
          die();
        } else {
          echo  won();
          echo "<br><br><button><a href='hangman.php' style=text-decoration:none>Restart</a></button>";
          die();
        }
      }
    }
    echo "Attempts Remaining ", 8 - $length;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
