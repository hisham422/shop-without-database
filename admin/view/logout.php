<?php
session_start();
if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){
    $_SESSION['adminlogin']=false;
    header("location: ../../login.php");
    exit();
}
else{
    header("location: ../../index.php");
    exit();
}