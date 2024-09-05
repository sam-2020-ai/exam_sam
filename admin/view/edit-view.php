<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";





$id=$_GET["id"];


require_once("../../connection.php");
       $query="select * from products where id=$id";
       $result=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result)==1){
        $product=mysqli_fetch_assoc($result);
        $title1 = $product["title"];
        $price1 = $product["price"];
        $disc1= $product["dis"];
        $quan1=$product["quantity"];


        

    }else{
        header("location:edit-delete.php?msg=not-found");
    }





?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                
                
                <form method="POST" action="edit-handle.php?id=<?php echo $id?>" enctype="multipart/form-data">
<?php
                require_once("../../connection.php");
                $querys="select * from cat";
                $results=mysqli_query($conn,$querys);


                if(mysqli_num_rows($results)>0){
                $cats=mysqli_fetch_all($results,MYSQLI_ASSOC);
                  
                  
?>
                  <div class="form-group">
                  <label>category</label>
                    <select name="cat" class="form-select" aria-label="Default select example">
                           
                          <?php foreach ($cats as $cats) { ?>
                           <option value="<?php echo $cats["cat"] ?>" ><?php echo $cats["cat"] ?></option>
                          <?php }} ?>
                    </select>
                  </div>
                  <?php
if(isset($_SESSION["errors"]["cat"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["cat"]; ?>
</div>
<?php
}

?>





                  
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="<?php echo $title1 ?>" name="title" class="form-control p_input">
                  </div>
                  <?php
if(isset($_SESSION["errors"]["title"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["title"]; ?>
</div>
<?php
}

?>


                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" value="<?php echo $disc1 ?>" name="disc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                  
                  <?php
if(isset($_SESSION["errors"]["disc"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["disc"]; ?>
</div>
<?php
}

?>




                    <label>Price</label>
                    <input type="number" value="<?php echo $price1 ?>" name="price" class="form-control p_input">
                    <?php
if(isset($_SESSION["errors"]["price"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["price"]; ?>
</div>
<?php
}

?>
                  </div>

                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" value="<?php echo $quan1 ?>" name="quantity" class="form-control p_input">
                  </div>
                  <?php
if(isset($_SESSION["errors"]["quantity"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["quantity"]; ?>
</div>
<?php
}

?>
                  
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control p_input">
                  </div>

                  <?php
if(isset($_SESSION["errors"]["img"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["img"]; ?>
</div>
<?php
}unset($_SESSION["errors"]);

?>






                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">edit</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php 
include "../view/footer.php";
 ?>