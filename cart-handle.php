<?php

// extract($_GET);
session_start();
require_once("connection.php");



if(isset($_POST["add"])){

    if(isset($_GET["id"])){
        $id_p=$_GET["id"];

    }else{
        header("location:shop.php");
    }
    
    extract($_POST);

    if(isset($_SESSION["login"]["id"])){
        $id_user=$_SESSION["login"]["id"];
    }else{
        header("location:shop.php");
    }
    
    $query="insert into addcart
    (`cat`,`price`,`image`,`id_user`,`quantity`,`id_product`)
    values
    ('$title','$price','$image', $id_user,'$quantity','$id_p')";

    $result=mysqli_query($conn,$query);
    if($result){
        header("location:cart.php?id=2");
    }else{
        header("location:shop.php");
    }
    

}else{
    header("location:shop.php");
}





?>