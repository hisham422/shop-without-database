<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $oldImage = $_SESSION['products'][$id]['img'];
    $imgpath = '../upload/' . $oldImage;
    unlink($imgpath);
    unset($_SESSION['products'][$id]);
    $_SESSION['success']="product deleted successfuly";
    header("location:../view/allProduct.php");
    exit();
}
