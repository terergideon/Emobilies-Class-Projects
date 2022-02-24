<?php

include 'config.php';
session_start();
error_reporting(0);
if(isset($_session["username"])){

    header('location:welcome.php');
}
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    //cjeck if the passwords match

    if ($password ==$cpassword){
        $sql = "select * from users where email = '$email'";
        $result =mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql  = "insert into users(firstName, lastName,username, email, password) 
                    values ('$fname','$lname','$username', '$email', '$password')";
                    
            $result =  mysqli_query($conn,$sql);
            
            die("Unable to connect to $sql");

          
            if($result){
               echo"<script>alert('Login successful')</script>";
            $fname = "";
            $lname = "";
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";


            }
            else{"<script>alert('Woops!Try again something went wrong')</script>";} 


        }
        else{
            echo"<script> alert('email already exitst in the system')</script>";
        }
        
    }
    else {
        echo"<script> alert('OOps passwords do not match!!')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap links -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign uP form</title>
   
    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> -->
</head>
<body>
<div class="container"> 
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">
            Register
            </p>
            <div class="input-group">
                <input type="text" placeholder="first name" name="fname" value="<?php echo $fname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="last name" name="lname" value="<?php echo $lname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn"> Register </button>
            </div>
            <p class="login-register-text"> already have an account? <a href="index.php">Login Here </a> . </p>
        </form>         
    </div>
     
</body>
</html>