<?php
  
  include 'result.php';
    
$data= array('smp','app','collage','python','hall','basket','slack','oxygen','arun','hand','mobile','hangman','data','company','laptop');
$con;
function checkCharacter($userInput){
  
       global $data,$con;
       $arraylenght=count($data);

       $servername="localhost";
       $username="root";
       $password="";


       try{

        $con = new PDO("mysql:host=$servername;dbname=hangman",$username,$password);
        
        $fetchData = $con->query("select * from user where Id=1");
        $record = $fetchData->fetch(PDO::FETCH_NUM);
      
        $value=$record[1].$userInput;

        $insertData = $con->query("update user set name='$value' where Id=1");
        $fetchData = $con->query("select * from user where Id=1");
        $record = $fetchData->fetch(PDO::FETCH_NUM);
        echo $record[1];
        $length=strlen($record[1]);
        echo "Attempts Remaining ",8-$length;
       if($record){

         for($index=0;$index<$arraylenght;$index++){

           if($record[1]==$data[$index]){

              echo '<br><br>',won();
              echo "<br><br><button><a href='hangman.php' style=text-decoration:none>Restart</a></button>";


           }
         }
       }
       else{
         die ('failed...');
       }
      }
      catch(PDOException $e){

        echo lost();

        echo "Game Over",'<br><br>';
        
        echo "<button><a href='hangman.php' style=text-decoration:none>Restart</a></button>";
      }
   
   
}




?>