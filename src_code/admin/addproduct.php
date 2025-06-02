<?php
session_start();
include "db.php";

if(isset($_POST['btn_save']))
{
    $product_name = $_POST['product_name'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $c_price = $_POST['price'];
    $product_type = $_POST['product_type'];
    $brand = $_POST['brand'];
    $tags = $_POST['tags'];
    $stock_qty = $_POST['stock_qty']; // New line to get stock quantity

    // Picture coding
    $picture_name = $_FILES['picture']['name'];
    $picture_type = $_FILES['picture']['type'];
    $picture2_name = $_FILES['picture2']['name'];
    $picture2_type = $_FILES['picture2']['type'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_size = $_FILES['picture']['size'];
    $picture2_tmp_name = $_FILES['picture2']['tmp_name'];
    $picture2_size = $_FILES['picture2']['size'];

    // Check file type and size for first image
    if(($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") && $picture_size <= 500000000) {
        $pic_name = time()."_".$picture_name;
        move_uploaded_file($picture_tmp_name, "../product_images/".$pic_name);
    } else {
        die("Invalid file type or size for the first image.");
    }

    // Check file type and size for second image
    if(($picture2_type == "image/jpeg" || $picture2_type == "image/jpg" || $picture2_type == "image/png" || $picture2_type == "image/gif") && $picture2_size <= 500000000) {
        $pic2_name = time()."_".$picture2_name;
        move_uploaded_file($picture2_tmp_name, "../product_images/".$pic2_name);
    } else {
        die("Invalid file type or size for the second image.");
    }

    // Insert query with error checking
    $query = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_image2, product_keywords, stock_qty) 
              VALUES ('$product_type', '$brand', '$product_name', '$price', '$details', '$pic_name', '$pic2_name', '$tags', '$stock_qty')";

    if(mysqli_query($conn, $query)) {
        header("Location: sumit_form.php?success=1");
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image1</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="">
                        <label for="">Add Image2</label>
                        <br>
                        <input type="file" name="picture2" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                  <div class="col-md-12">
                  <div class="form-group">
                      <label>Product Category</label>
                      <select id="product_type" name="product_type" style="background-color: #222a42; color: white;" required class="form-control">
                          <option value="">Select Product Category</option>
                          <option value="1">Gym Equipment</option>
                          <option value="2">Gym Wear</option>
                          <option value="3">Gym Nutrition</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Product Brand</label>
                      <select id="brand" name="brand" style="background-color: #222a42; color: white;" required class="form-control">
                          <option value="">Select Product Brand</option>
                       
                          <option value="1">Muscle Blaze</option>
                          <option value="2">GNC</option>
                          <option value="3">Nutrabay</option>
                          <option value="4">MuscleTech</option>
                          <option value="5">Equipment</option>
                          <option value="6">Clothing</option>
                          <!-- Add your brand options here -->
                      </select>
                  </div>
                </div>
                <div class="col-md-12">
                      <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="number" id="stock_qty" name="stock_qty" required class="form-control" >
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>
