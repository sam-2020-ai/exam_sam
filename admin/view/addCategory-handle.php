<?php

// extract($_GET);
session_start();
require_once("../../connection.php");



if(isset($_POST["submit"])){
    
    extract($_POST);
    
    $querys="select * from cat where `cat`='$cat'";
    $results=mysqli_query($conn,$querys);



    $errors=[];

    if(empty($cat)){
        $errors["cat"]="cat is requiered" ;
    }elseif(is_numeric($cat)){
      $errors["cat"]="cat must be str" ;
    }elseif(mysqli_num_rows($results)>0){
        $errors["cat"]="cat is already exist" ;
    }




    if(empty($errors)){

        
       
    
        $query="insert into cat(`cat`) values('$cat')";
    
        $result=mysqli_query($conn,$query);
            header("location:addCategory.php");
       }else{
            
        header("location:addCategory.php");
            $_SESSION["errors"]=$errors;
    
       }
    
    }else{
        header("location:addCategory.php");
    }
    
    
    
    
    
    ?>