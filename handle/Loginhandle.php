<?php
session_start();
require_once 'Loginvalidation.php';

if (isset($_POST['login'])){
    $email=trim(htmlspecialchars($_POST['email']));
    $password=trim(htmlspecialchars($_POST['password']));
    


if($email=='admin@email.com' && $password=='12345678A'){
    $_SESSION['adminlogin'] = true;
    header("location:../admin/view/layout.php");
    exit();

}

if(isset($_SESSION['users'])){


$emails=array_column($_SESSION['users'],'email');
$index=array_search($email,$emails);
$hashPassword=$_SESSION['users'][$index]['password'];
if(in_array($email,$emails) && password_verify($password,$hashPassword)){
    $_SESSION['login']=true;
    $name=$_SESSION['users'][$index]['name'];
    $_SESSION['userName']=$name;
    $_SESSION['success']="welcome back, " . $name;
    header("Location: ../shop.php");
    exit();
} 
else {
    $_SESSION['errors'][]="Invalid email or password";
    header("Location: ../login.php");
    exit();
}
}
else{
    $_SESSION['email']=$email;
    header("Location: ../signup.php");
    exit();
}
}

?>