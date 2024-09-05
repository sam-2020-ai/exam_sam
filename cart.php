<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php
if(!isset($_SESSION["login"])){
    header("location:login.php");
}
?>




<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>


 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    
                    
                </tr>
            </thead>
   
            <tbody>


            <?php
    require_once("connection.php");
    if(isset($_SESSION["login"]["id"])){
        $id_user=$_SESSION["login"]["id"];
    }else{
        header("location:shop.php");
    }


    $query="select * from addcart where id_user=$id_user";

    $result=mysqli_query($conn,$query);
    


    if(mysqli_num_rows($result)>0){
        $products=mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        


        foreach ($products as $products) { ?>
                <tr>

        
                    <input type="hidden" name="" value="<?php echo $products["id_product"] ?>">
                    <td><img src="admin/assets/images/imm/<?php echo $products["image"] ?>" alt="product1"></td>
                    <td><?php echo $products["cat"] ?></td>
                    <td><?php echo $products["quantity"] ?></td>
                    <td><?php echo $products["price"] ?></td>
                    <td><?php echo $products["price"] * $products["quantity"]  ?></td>
                    <!-- <td><button type="submit"  class="btn btn-danger">Remove</button></td> -->
                    
                    
                
                </tr>
        <?php
    }}
    ?>
            </tbody>
            <!-- confirm order  -->
            <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
            
        </table>
    </section>

    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->

    <?php include "footer.php" ?>

