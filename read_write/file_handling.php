<?php include 'functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handling</title>

    <style>
        body{
            position: absolute;
            left: 550px;
            top: 100px;
        }
        #inputfilename{
            position: relative;
            left: 90px;
            width: 235px;
            padding: 10px;
            font-size: 20px;
           
        }
        h2{
            display: inline-block;
        }
        #box{
            width: 100px;
            padding: 10px;
            font-size: 20px;
            background-color: yellow;
            color: black;
            border-radius: 30%;

        }
        button{
            width: 100px;
            padding: 10px;
            font-size: 20px;
            background-color: green;
            color: white;
            border-radius: 30%;
        }
        
       
    </style>
</head>
<body>

    <form method="POST">
        <br><br>
        <input type="text" name="filename" id="inputfilename" placeholder="Enter File Name"> <br><br>
        <h2>Message</h2> <textarea name="message" rows="8" cols="30"> <?php  ?> </textarea><br><br>
        <h2>Select Task:</h2>
        <select name="task" id="box">

            <option value="write">Write</option>
            <option value="read">Read</option>
            <option value="append">Append</option>

        </select>

        &nbsp; &nbsp; &nbsp;<button name="submit">Done</button>
    </form>


    
</body>


</html>