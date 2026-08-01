<?php
$signupvalidation = [
    'name'=>['filter_type'=>FILTER_VALIDATE_REGEXP,
    'myoptions'=>['options'=>['regexp'=>'/^[a-zA-Z ]*$/']],
    'errors'=>'Name should only contain letters and spaces.'],
    'email'=>['filter_type'=>FILTER_VALIDATE_EMAIL,
    'myoptions'=>null,
    'errors'=>'Invalid email format.'],
    'password'=>['filter_type'=>FILTER_VALIDATE_REGEXP,
    'myoptions'=>['options'=>['regexp'=>'/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/']],
    'errors'=>'Password must be at least 8 characters long and contain both letters and numbers.'],
    'phone'=>['filter_type'=>FILTER_VALIDATE_REGEXP,
    'myoptions'=>['options'=>['regexp'=>'/^[0-9]{11}$/']],
    'errors'=>'Invalid phone number format.']
];
$errors=[];
    foreach($signupvalidation as $key=>$value){
        $check=filter_input(INPUT_POST,$key,$value['filter_type'],$value['myoptions']);
        if(empty($_POST[$key])){
            $errors[$key]=$key." is required";
        }elseif($check===false){
            $errors[$key]=$value['errors'];
        }
    }
        if(!empty($errors)){
            $_SESSION['errors']=$errors;
            header("Location: ../signup.php");
            exit();
        }

?>