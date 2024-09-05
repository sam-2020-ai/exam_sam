<?php

// extract($_GET);
session_start();
require_once("connection.php");



if(isset($_POST["submit"])){
    
    extract($_POST);
    
    $query="select * from admins where `email`='$email'";
    $result=mysqli_query($conn,$query);
    

    if(mysqli_num_rows($result)==1){
        
        $user=mysqli_fetch_assoc($result);
        $oldpassword=$user["password"];
        $id=$user["id"];
        
       $verifay = password_verify($password,$oldpassword);



       if($verifay){
       

        $idd=$_SESSION["login"]["id"]=$id;

        header("location:index.php?id=$idd");


       }else{
        $errors["password"]="password not correct" ;
        
        header("location:login.php");
        $_SESSION["errors"]=$errors;
       }

    }else{
        $errors["email"]="email not correct" ; 
        header("location:login.php");
        $_SESSION["errors"]=$errors;
    }



    

}else{
        header("location:login.php");
}








