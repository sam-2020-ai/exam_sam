<?php


session_start();
require_once("../../connection.php");

$id=$_GET["id"];

$query="select * from products where id=$id";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)==1){
    $old_img=mysqli_fetch_assoc($result)['image'];

    if(! empty($old_img)){
        unlink("../assets/images/imm/$old_img");
    }

    $query="delete from products where id=$id";
    $result=mysqli_query($conn,$query);

    if($result){
        $_SESSION["yes"]=["deleted"];
        header("location:edit-delete.php");

    }else{
        $_SESSION["no"]=["error,try again"];
        header("location:edit-delete.php");
    }
}else{
    $_SESSION["no"]=["error,try again"];
    header("location:edit-delete.php");
}
