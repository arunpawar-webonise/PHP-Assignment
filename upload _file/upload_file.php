<?php include_once 'functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>

    <style>
         body{
            position: absolute;
            left: 550px;
            top: 100px;
        }
        input{
            width: 235px;
            padding: 10px;
            font-size: 20px;
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
    
    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="fileName" placeholder="Enter File name"><br><br>
        <input type="file" name="selectFile"><br><br>
        <button name="upload">Upload</button><br><br>

    </form>



</body>
</html>