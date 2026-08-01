<?php
session_start();
if(isset($_POST['editProduct'])){
    $cat = trim(htmlspecialchars($_POST['cat']));
    $title = trim(htmlspecialchars($_POST['title']));
    $desc = trim(htmlspecialchars($_POST['desc']));
    $price = trim(htmlspecialchars($_POST['price']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
    $index = trim(htmlspecialchars($_POST['id']));
    $oldImage = $_SESSION['products'][$index]['img'];


    $errors=[];
    if(empty($cat)|| empty($title) || empty($desc) || empty($price) || empty($quantity)){
        $errors[] = "All fields are required.";
    }






    if(!empty($_FILES['img']['name'])){

        $img= $_FILES['img'];
        $imgName = $img['name'];
        $imgTempName = $img['tmp_name'];
        $ext = pathinfo($imgName,PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $extension=['png','jpg','jpeg','webp'];
        if ($img['error'] != 0) {
            $errors[] = "Failed to upload image.";
        }

        if (!in_array($ext, $extension)) {
            $errors[] = "Invalid image type.";
        }else{
            $imgNewName = uniqid(). '.' . $ext;
        }

    }else{
        $imgNewName = $_SESSION['products'][$index]['img'];
    }

    

    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        $_SESSION['cat']=$cat;
        $_SESSION['title']=$title;
        $_SESSION['desc']=$desc;
        $_SESSION['price']=$price;
        $_SESSION['quantity']=$quantity;
        header("location:../view/editProduct.php?id=" . $index);
        exit();
    }
    


    if(!empty($_FILES['img']['name'])) {
        $imgpath = '../upload/' . $oldImage;
        if (move_uploaded_file($imgTempName,"../upload/".$imgNewName)) {
            unlink($imgpath);
        }        
        
    }




    $_SESSION['products'][$index]['cat'] = $cat;
    $_SESSION['products'][$index]['title'] = $title;
    $_SESSION['products'][$index]['desc'] = $desc;
    $_SESSION['products'][$index]['price'] = $price;
    $_SESSION['products'][$index]['quantity'] = $quantity;
    $_SESSION['products'][$index]['img'] = $imgNewName;


    $_SESSION['success']="product updated successfuly";
    header("location:../view/allProduct.php?id=" . $index);
    exit();


}
?>