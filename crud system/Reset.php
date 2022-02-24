<?php

include 'config.php';
session_start();
error_reporting(0);
// if(isset($_session["username"])){

//     header('location:index.php');
// }

//check what the user posted and reset it in the database.
if(isset($_POST['submit'])){
    $email = $_POST['email'];
   

    //check if the email posted exists
        // if ($email=''){
        //     echo " <script> alert('Email cant be blank')</script>";
            
        // }
        // else{
        //     $sql = "select * from users where email ='$email'";
        //     $result = mysqli_query($conn, $sql);
        //     return $result;
            
        // } 
        // if ($result ==$email ){
        //     echo " <script> alert('This is mail exists')</script>";

        // }
        // else{
        //     echo " <script> alert('Email doesnt exists on the System')</script>";
        // }
  

}
use PHPMailer\PHPmailer\PHPMailer;
use PHPMailer\PHPmailer\SMTP;
use PHPMailer\PHPmailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

//instantiate and passing true enables exception
$mail =new PHPMailer(true);

try{
    //server setting
    $mail->isSMTP();
    $email->Host  = 'smtp.gmail.com';
    $mail->Host  = 'true';
    $mail->Host  = 'youremail@gmail.com';
    $mail->Password  ='********';
    $mail->SMTSecure  = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port  = 587;
    $mail->setFrom  ('youremail@gmail.com', 'Terer Gideon');
    $mail->addAddress($emal);
    $code = subtr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);

    //content
    $mail -> isHTML (true);
    $mail ->subject ='Password Reset' ;
    $mail->Body ='  To reset yur password click <a href="http://localhost/monclass/password.php?code=' .$code.'">here </a>';
    $conn = new mysqli('localhost','root','','logincrud');
    

    if ($conn->connect_error){
        die ('could not connect to database');

    }
    $verifyQuery = $conn->query( "select * from users where email ='$email'");
    if ($verifyQuery->num_rows){
        $codeQuery =$conn->query("update users set code = '$code' where email ='$email'");
        $mail ->send ();
        echo "<script>alert('Message has been sent, check your email address for the same')</script>";

    


    }
    else {
            echo "<script>alert('kindly use the valid email address')</script>";

    }
}
catch(Exception $e){
    echo"<script>alert('Message couldnt be sent. Enter  a valid Email')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Reset Pass</title>
</head>
<body>
<div class ="container">
        <form action="" method="POST" class="login-email">
        <p class="login-text" style="font-size: 2rem; font: weight 800;">Reset Password</p>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email"  value="<?php echo $email;?> " required>

        </div>
        
        <div class="input-group">
           <button name="submit" class="btn">Reset Password</button>
        </div>
        <p class="login-register-text">We will send password to your account<a href="register.php">Register here</a></p>
        <p class="login-register-text">Dont have an account?<a href="register.php">Register here</a></p>
    
    </form>
    </div>
</body>
</html>
<?php
