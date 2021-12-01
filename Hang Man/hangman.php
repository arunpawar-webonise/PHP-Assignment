<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman</title>
    <style>
        body{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST">
        Maximum Attepts : 8<br><br>
        Guess:<input type="text" name="guess" maxlength="1" autocomplete="off"><br><br>
        <button name="check">Check</button><br><br>
    </form>


<?php

       
       
         
            include 'functions.php';
         
            if(isset($_POST['check'])){
                
             $userInput=$_POST['guess'];
             
                if($userInput==null){
                    echo 'Please enter something';
                }
               
                else{
                    checkCharacter($userInput);
                }
     
            }
            
    
    

    ?>
</body>
</html>