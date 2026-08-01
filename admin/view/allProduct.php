<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";

?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <!-- <div class="card col-lg-4 mx-auto"> -->

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
               <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($_SESSION['products'] as $index => $product): ?>
                    <tr>
                      <th scope="row"><?= $index + 1 ?></th>
                      <td><?= $product['title'] ?></td>
                      <td><?= $product['price'] ?></td>
                      <td><?= $product['quantity'] ?></td>
                      <td>
                        <a href="editProduct.php?id=<?= $index ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <a href="deleteProduct.php?id=<?= $index ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <!-- </div> -->
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