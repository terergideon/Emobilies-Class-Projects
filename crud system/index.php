<?php
include 'config.php';
// starting a session 
session_start();
error_reporting(0);//start error reporting

//check if session is existing.
if(isset($_session["username"])){

    header('location:welcome.php');
}

// check the info isset haha.. by using the superglobal post
if(isset($_POST['submit'])){
    $email =$_POST['email'];
    $password =md5($_POST['password']);//md5 encrypts the password
}
?>
<!-- the form used -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My form</title>

    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <head>
    <section class="section1">
     
        <form action="index.php" method="POST" class="form"> 
       
                 <div class="text-dark ">
                    <p class="login">login</p>
                </div>
        
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <div class="submit">
                <button type="submit" class="btn ">login</button>
                <p style="text-align: center;"> Dont Have ACCOUNT?<a href="register.php">Register here</a></p>
                </div>
                
        </form> 
    </section>
        
    </head>
</body>
</html>