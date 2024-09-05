<?php 
if(isset($_GET["logout"])){
    unset($_SESSION["login"]);
    header("location:login.php");
}else{
    header("location:shop.php");
}
?>