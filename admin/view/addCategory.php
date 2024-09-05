<?php

include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
?>


      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Category</h3>
                <form method="POST" action="addCategory-handle.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="cat" class="form-control p_input">
                  </div>
                  <?php
if(isset($_SESSION["errors"]["cat"])){ ?>
<div class="alert alert-danger" role="alert">
<?php echo $_SESSION["errors"]["cat"]; ?>
</div>
<?php
}

?>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Add</button>
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