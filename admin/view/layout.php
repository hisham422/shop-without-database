<?php
session_start();
if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] !== true){
    header("Location: ../../login.php");
    exit();
}
include "../view/header.php";
include "../view/sidebar.php";
include "../view/body.php";
include "../view/navbar.php";
include "../view/footer.php";
include "../view/logout.php";

?>