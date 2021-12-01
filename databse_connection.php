<?php
 session_start();
// User Registration
if (isset($_POST['submit'])) {

    // User Input
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


        $sqlQuery = "insert into users(FirstName,LastName,Email,Contact,Password) values('$firstName', '$lastName', '$email', '$contact','$password')";

        $sql = $conn->query($sqlQuery);

        if ($sql) {
            echo 'Successfully Registered';
        } else {
            echo 'Failed...';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


// User Login
if (isset($_POST['login'])) {
    $localhost = 'localhost';
    $username = 'root';
    $pass = "";

    $useremail = $_POST['loginemail'];
    $userpassword = $_POST['loginpassword'];

    // Setting Session

    $_SESSION['useremail']=$useremail;
    $_SESSION['password']=$userpassword;
    
    // Setting Cookies
    if($_POST['rememberme']){
        setcookie('emailcookie',$useremail,time()+(86400*5),"/");
        setcookie('passwordcookie',$userpassword,time()+(86400*5),"/");

        // header('location:multi_user_application.php');
    }
    
    try {
        $conn = new PDO("mysql:host=$localhost;dbname=crud", $username, $pass);


        $sql = $conn->query("select * from users where Email='$useremail' and Password='$userpassword'");
        $record = $sql->fetch(PDO::FETCH_NUM);
        if ($record) {
            echo "FistName &nbsp;&nbsp;&nbsp;&nbsp; LastName  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password", '<br>';
            for ($index = 1; $index < 6; $index++) {
                echo $record[$index], '&nbsp;&nbsp;&nbsp&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp';
            }
            echo "<button><a href='edit.php' style=text-decoration:none class='btn btn-secondary'>Edit</a></button>";
            echo $id;
        } else {
            echo 'user does not exist';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


// Edit Profile

?>

