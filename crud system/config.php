<?php
$servername ='localhost';
$username ='root';
$password ='';
$dbname ='logincrud';



//create connection

$conn = mysqli_connect($servername ,$username ,$password ,$dbname);

//check the connection

if(!$conn){
    die("<script>alert('connection failed')</script>");
}
else{
    // echo'successful connected';
}