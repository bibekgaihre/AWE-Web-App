<?php
include '../../config/init.php';
var_dump($conn);
    $email=$_POST['email'];
    echo $email;
    $password=$_POST['password'];
    // $email = mysqli_real_escape_string($conn,$email);
    $query="SELECT * FROM user WHERE email='$email' AND password='$password' ";

    
    $result=mysqli_query($conn,$query) or die('Error');
    $rows=mysqli_num_rows($result);
    
    if($rows==1){
    $_SESSION['email']=$email;
    header("Location:dashboard.php");
    }
    else{
    echo "email or password not found";
    }
   

    
   

  


?>