<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
        form {
            display: none;
        }
       
    </style>


    <title>Multi User Application!</title>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center text-danger">User Registration Form</h1>

        <div class="row">
            <div class="col-sm-8">

                <!-- User Registraion Form -->

                 <form method="POST" class="registerForm">

                    <div class="form-group">
                        <label>FirstName</label>
                        <input type="text" name="firstname" class="form-control" placeholder="enter your first name" required>
                    </div>

                    <div class="form-group">
                        <label>LastName</label>
                        <input type="text" name="lastname" class="form-control" placeholder="enter your last name" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="enter your  email" required>
                    </div>

                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control" placeholder="enter your contact" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="enter your password" required>
                    </div>

                    <br><br>
                    <button name="submit" class="btn btn-outline-success" onclick="submitForm()">Submit</button><br><br>


                </form>

                <!-- User Login Form -->

                <form method="POST" class="loginForm">


                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="loginemail" value="<?php $_COOKIE['useremail'] ?>" class="form-control" placeholder="enter your password" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label> 
                        <input type="text" name="loginpassword" value="<?php if(isset($_COOKIE['password'])) ?>" class="form-control" placeholder="enter your password" required>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="rememberme">
                        Remember me

                    </div>

                    <br><br>

                    <button name="login" class="btn btn-outline-success">Login</button><br><br>


                </form>




               
                <!-- Main Buttons -->
                <button onclick="showRegistrationForm()" class="registerbtn btn btn-outline-danger">Register</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <button onclick="showLoginForm()" class="loginbtn btn btn-outline-success">Login</button>

                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-outline-primary editbtn" onclick="showEditForm()">Edit</button><br><br> -->

            </div>
        </div>
    </div>

    <!-- Php include -->
     
    <?php include 'databse_connection.php' ?>

    <!-- Javacript Attach -->

    <script src="multi_user.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>