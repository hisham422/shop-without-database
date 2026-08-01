<?php
session_start();
if(isset($_POST['addProduct'])){
    $cat = trim(htmlspecialchars($_POST['cat']));
    $title = trim(htmlspecialchars($_POST['title']));
    $desc = trim(htmlspecialchars($_POST['desc']));
    $price = trim(htmlspecialchars($_POST['price']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
    $img = $_FILES['img'];
    $imgName = $img['name'];
    $imgTempName = $img['tmp_name'];
    $ext = pathinfo($imgName,PATHINFO_EXTENSION);
    $ext = strtolower($ext);
    $extension=['png','jpg','jpeg','webp'];


    $errors=[];
    if(empty($cat)|| empty($title) || empty($desc) || empty($price) || empty($quantity) || empty($imgName)){
        $errors[] = "All fields are required.";
    }
    if(empty($imgName)){
        $errors[] = "image required";
    }
    elseif($img['error']!=0){
        $errors[] = "faild file";
    }
    elseif(!in_array($ext,$extension)){
        $errors[] = "invalid file type";
    }
    
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        $_SESSION['cat']=$cat;
        $_SESSION['title']=$title;
        $_SESSION['desc']=$desc;
        $_SESSION['price']=$price;
        $_SESSION['quantity']=$quantity;
        header("location:../view/addProduct.php");
        exit();
    }

    $imgNewName = uniqid(). '.' . $ext;


    $_SESSION['products'][] = [
        'cat'=>$cat,
        'title'=>$title,
        'desc'=>$desc,
        'price'=>$price,
        'quantity'=>$quantity,
        'img'=>$imgNewName
    ];

    move_uploaded_file($imgTempName,"../upload/".$imgNewName);
    $_SESSION['success']="product added successfuly";
    header("location:../view/addProduct.php");
    exit();


}
?>