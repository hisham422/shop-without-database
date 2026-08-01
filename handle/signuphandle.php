<?php
session_start();
require_once 'signupvalidation.php';

if(isset($_POST['signup'])){
    $name=trim(htmlspecialchars($_POST['name']));
    $email=trim(htmlspecialchars($_POST['email']));
    $password=trim(htmlspecialchars($_POST['password']));
    $phone=trim(htmlspecialchars($_POST['phone']));
    $address=trim(htmlspecialchars($_POST['address']));

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION['users'][]=['name'=>$name,'email'=>$email,'password'=>$hashed,'phone'=>$phone,'address'=>$address];
        header("Location: ../login.php");
}   