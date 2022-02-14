<?php

include 'config.php';
session_start();
error_reporting(0);
if(isset($_session["username"])){

    header('location:welcome.php');
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<section class="section1">
     
     <form action="index.php" method="POST" class="form">
                 <p class="login">register</p>
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
             <button type="submit" class="btn ">Sign up</button>
             <p style="text-align: center;"> Have Account?<a href="index.php">sign in</a></p>
             </div>
             
     </form> 
 </section>
     
</body>
</html>