<?php

// extract($_GET);
session_start();
require_once("../../connection.php");



if(isset($_POST["submit"])){
    
    extract($_POST);
    



    $errors=[];



    //title
    if(empty($title)){
        $errors["title"]="title is requiered" ;
    }elseif(strlen($title<25)){
        $errors["title"]="title must be less than 25 " ;
    }



        //disc
        if(empty($disc)){
            $errors["disc"]="disk=c is requiered" ;
        
        }elseif(strlen($disc<25)){
            $errors["disc"]=" must be less than 25 " ;
        }


   
    //price

    if(empty($price)){
        $errors["price"]="price is requiered" ;
    }elseif(!is_numeric($price)){
      $errors["price"]="price must be number" ;
    }


    if(empty($quantity)){
        $errors["quantity"]="quantity is requiered" ;
    }elseif(!is_numeric($quantity)){
      $errors["quantity"]="quantity must be number" ;
    }


//    cat


if(empty($cat)){
    $errors["cat"]="cat is requiered" ;
}elseif(is_numeric($cat)){
  $errors["cat"]="cat must be str" ;
}









//img

$image=$_FILES["image"];
$image_name=$image["name"];
$image_tmp=$image["tmp_name"];
$image_error=$image["error"];
$image_size=$image["size"]/(1024*1024);
$image_extension=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
// move_uploaded_file($image_tmp,"images/$new_name");
$exarr=["png","jpg","gif"];


if($image_error != 0){
    $errors["img"]="error";
}elseif($image_size > 1){
    $errors["img"]="error size";
}elseif(!in_array($image_extension,$exarr)){
    $errors["img"]="error ex";
}
    






   if(empty($errors)){
    $new_name=uniqid().".$image_extension";
    move_uploaded_file($image_tmp,"../assets/images/imm/$new_name");
    $id=$_GET["id"];
    
    $query="UPDATE products set `price`='$price',`image`='$new_name',`dis`='$disc',`quantity`='$quantity',`title`='$title' where `id`='$id'";
         

         $result=mysqli_query($conn,$query);

         header("location:edit-delete.php");
   }else{
        
    header("location:edit-delete.php");

        $_SESSION["errors"]=$errors;

   }

}else{
    header("location:edit-delete.php");
}



// : Cannot modify header information - headers already sent by (output started at E:\xampp\htdocs\exam\admin\view\sidebar.php:1) in





?>