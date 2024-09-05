
<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php
if(!isset($_SESSION["login"])){
    header("location:login.php");
}
?>



<section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">

        
        <?php
    require_once("connection.php");
    $query="select * from products";

    $result=mysqli_query($conn,$query);
    


    if(mysqli_num_rows($result)>0){
        $products=mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        foreach ($products as $products) { ?>
                        <div class="pro">
                <form action="cart-handle.php?id=<?php echo $products["id"] ?>" method="post">
                <img src="admin/assets/images/imm/<?php echo $products["image"] ?>" alt="">
                <div class="des">
                    <span><?php echo $products["cat"] ?></span>
                    <h5><?php echo $products["title"] ?></h5>
                    
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo $products["price"] ?></h4>
                    <input type="hidden" name="id" value="<?php echo $products["id"] ?>">
                    <input type="hidden" name="title" value="<?php echo $products["title"] ?>">
                    <input type="hidden" name="cat" value="<?php echo $products["cat"] ?>">
                    <input type="hidden" name="image" value="<?php echo $products["image"] ?>">
                    <input type="hidden" name="price" value="<?php echo $products["price"] ?>">

                    

                    <input type="number" value="1" name="quantity">

                    <button type="submit" name="add"><i class="fas fa-shopping-cart"></i></button>
                    
                </div>
            </div>
     <?php   }
    }else{
        echo "not found";
    }



    ?>
</form>


        </div>
    </section>
    


    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>