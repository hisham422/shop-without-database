<?php

include "../view/header.php";
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $product = $_SESSION['products'][$id];
}else{
  header("location:allProduct.php");
  exit();
}

include "../view/sidebar.php";
include "../view/navbar.php";

?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Edit Product</h3>
                <?php require_once "../../inc/error.php";
                 require_once "../../inc/success.php";?>
                <form method="POST" action="../handle/editproducthandle.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="cat" class="form-control p_input" value="<?= $product['cat'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input" value="<?= $product['title'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input" value="<?= $product['desc'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input" value="<?= $product['price'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input" value="<?= $product['quantity'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <div class="text-center">
                    <button type="submit" name="editProduct" class="btn btn-primary btn-block enter-btn">Edit Product</button>
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