<?if (isset($_GET['code'])){
    $code = $_GET['code'];

    $conn = new mysqli( 'localhost','root','','logincrud');
    if ($conn->connect_error){
        die("could not connect to database");

    }
    $verifyQuery = $conn->query("select * from users where code ='$code'");
    if($verifyQuery->num_rows==0){
        header("location:index.php");
        exit();
    }

    if(isset($_POST['submit'])){

        $newpassword =md5($_POST['newpassword']);
        $confirm_pass =md5($_POST['confirm_pass']);

        if($newpassword  =$confirm_pass){
            $changeQuery  = $conn->query("update users set pass  = '$newpassword' where code  = '$code'");


        }

        if($changeQuery){

            echo "<script>alert('password changed successfully')</script>";
        }
             $conn->close();


    }





}




?>