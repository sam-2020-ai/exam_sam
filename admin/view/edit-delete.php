<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";











?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto w-100">

              <div class="card-body px-5 py-5" >
                <h3 class="card-title text-left mb-3">edit-delete Product</h3>

                <?php
                if(isset($_SESSION["yes"])){ ?>
                
                <div class="alert alert-primary" role="alert">
                deleted successfully
                </div> 

                
                <?php
                }unset($_SESSION["yes"]);

                if(isset($_SESSION["no"])){
                  ?>
                
                  <div class="alert alert-primary" role="alert">
                  can`t delete product, try again
                  </div> 
  
                  
                  <?php
                }unset($_SESSION["no"]);


                ?>


                <table class="table table-bordered table-contextual">
                        <thead>

                          <tr>
                            <th> id </th>
                            <th> category </th>
                            <th> title </th>
                            <th> quantity </th>
                            <th> discription </th>
                            <th> price </th>
                            <th> image </th>
                            <th> edit </th>
                            <th> delete </th>


                          </tr>
                        </thead>
                        <tbody>
       <?php
      require_once("../../connection.php");
       $query="select * from products";
       $result=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result)>0){
        $products=mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        foreach ($products as $products) { ?>
                          <tr class="table-info">
                            <td> <?php echo $products["id"] ?></td>
                            <td> <?php echo $products["cat"] ?> </td>
                            <td><?php echo $products["title"] ?> </td>
                            <td> <?php echo $products["quantity"] ?></td>
                            <td> <?php echo $products["dis"] ?></td>
                            <td> <?php echo $products["price"] ?></td>
                            <td> <img src="../../admin/assets/images/imm/<?php echo $products["image"] ?>" alt=""></td>
                            <td> <a href="edit-view.php?id=<?php echo $products["id"] ?>" class="btn btn-success" >EDIT</a></td>
                            <td> <a href="delete-handle.php?id=<?php echo $products["id"] ?>" class="btn btn-danger" >DELETE</a></td>


                          </tr>
        <?php   }
        }else{
            echo "not found";
        }?>

                        </tbody>
                      </table>
                
              
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