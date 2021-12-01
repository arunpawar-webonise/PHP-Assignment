<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Profile!</title>
</head>

<body>

   <?php
     $localhost = 'localhost';
     $username = 'root';
     $pass = "";

     $updateEmail = $_SESSION['useremail'];
     $updatePassword = $_SESSION['password'];
     

     

     try {

        $conn = new PDO("mysql:host=$localhost;dbname=crud", $username, $pass);


        $sql = $conn->query("select * from users where Email='$updateEmail' and Password='$updatePassword'");
        $record = $sql->fetch(PDO::FETCH_NUM);
        if ($record) {
        
            $dbfirstname=$record[1];
            $dblastname=$record[2];
            $dbemail=$record[3];
            $dbcontact=$record[4];
            $dbpassword=$record[5];

            
         }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

   ?>

    <!-- User Edit Form  -->
     
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

            <form method="POST" class="editForm">
        <div class="form-group">

            
            <label>FirstName</label>
            <input type="text" name="firstname" value="<?php echo $dbfirstname ?>" class="form-control" placeholder="enter your first name" required>
        </div>

        <div class="form-group">
            <label>LastName</label>
            <input type="text" name="lastname" value="<?php echo $dblastname ?>" class="form-control" placeholder="enter your last name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $dbemail ?>" class="form-control" placeholder="enter your  email" required>
        </div>

        <div class="form-group">
            <label>Contact</label>
            <input type="text" name="contact" value="<?php echo $dbcontact ?>" class="form-control" placeholder="enter your contact" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $dbpassword ?>" class="form-control" placeholder="enter your password" required>
        </div>

        <br><br>
        <button name="update" class="btn btn-outline-success">Update</button><br><br>

    </form>






            </div>
        </div>
    </div>
    


    <!-- Php -->

    <?php

        // Get Session
        
        $updateEmail = $_SESSION['useremail'];
        $updatePassword = $_SESSION['password'];
      

    if (isset($_POST['update'])) {
       
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];

        // Database Connection
        $localhost = 'localhost';
        $username = 'root';
        $pass = "";



        try {
            $conn = new PDO("mysql:host=$localhost;dbname=crud", $username, $pass);

            $sql1 = $conn->query("select * from users where Email='$updateEmail' and Password='$updatePassword'");
            $record = $sql1->fetch(PDO::FETCH_NUM);

            if ($record) {
                $sqlQuery = "update users set FirstName='$firstName',LastName='$lastName',Email='$email',Contact='$contact',Password='$password' where Email='$updateEmail' and Password='$updatePassword'";

                $sql = $conn->query($sqlQuery);

                if ($sql) {
                    echo 'Successfully Updated';
                } else {
                    echo 'Failed...';
                }
            } else {
                echo 'user does not exist';
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    ?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>