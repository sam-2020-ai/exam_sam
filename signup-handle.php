<?php

// extract($_GET);
session_start();
require_once("connection.php");



if(isset($_POST["submit"])){
    
    extract($_POST);
    



    $errors=[];



    //name
    if(empty($name)){
        $errors["name"]="name is requiered" ;
    }elseif(strlen($name<25)){
        $errors["name"]="name must be less than > " ;
    }


//email
    if(empty($email)){
        $errors["email"]="email is requiered" ;
    }elseif(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        $errors["email"]="email must be EMAIL" ;
    }elseif(strlen($email<30)){
        $errors["email"]="email must be less than > 30 " ;
    }

    //password
    if(empty($password)){
        $errors["password"]="password is requiered" ;
    }elseif(strlen($password<6)){
        $errors["password"]="password must be more than 5 " ;
    }



    if(empty($phone)){
        $errors["phone"]="phone is requiered" ;
    }elseif(!is_numeric($phone)){
      $errors["phone"]="phone must be number" ;
    }elseif(strlen($phone<7)){
        $errors["phone"]="phone must be more than 7 " ;
    }


//    cat


if(empty($address)){
    $errors["address"]="address is requiered" ;
}elseif(is_numeric($address)){
  $errors["address"]="address must be str" ;
}









    






   if(empty($errors)){
   
    $hash_pass = password_hash($password,PASSWORD_DEFAULT);
    $query="insert into admins(`name`,`email`,`address`,`phone`,`password`) values('$name','$email','$address','$phone','$hash_pass')";
    $result=mysqli_query($conn,$query);
        header("location:login.php");
   }else{
        
        header("location:signup.php");
        $_SESSION["errors"]=$errors;

   }

}else{
    header("location:signup.php");

}





?>