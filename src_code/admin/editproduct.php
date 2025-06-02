<?php
session_start();
include("db.php");

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database based on product_id
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Handle form submission for updating product details
    if(isset($_POST['update_product'])) {
        // Retrieve form data
        $product_title = $_POST['product_title'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_desc'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_keywords = $_POST['product_keywords'];
        $stock_qty = $_POST['stock_qty'];

        // Check if a new image is uploaded, if not, use the existing image
        $product_image = $_POST['product_image'] ? $_POST['product_image'] : $row['product_image'];
        $product_image2 = $_POST['product_image2'] ? $_POST['product_image2'] : $row['product_image2'];

        // Update product details in the database
        $update_query = "UPDATE products SET product_title = '$product_title', product_price = '$product_price', product_desc = '$product_description', product_cat = '$product_category', product_brand = '$product_brand', product_image = '$product_image', product_image2 = '$product_image2', product_keywords = '$product_keywords', stock_qty = '$stock_qty' WHERE product_id = '$product_id'";
        $update_result = mysqli_query($conn, $update_query);

        if($update_result) {
            // Product updated successfully
            header("Location: productlist.php"); // Redirect to product list page
            exit();
        } else {
            // Error updating product
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    // Redirect if product_id is not provided
    header("Location: productlist.php");
    exit();
}

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="product_title">Product Title</label>
                                <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $row['product_title']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $row['product_price']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <textarea name="product_desc" id="product_desc" class="form-control"><?php echo $row['product_desc']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_category">Product Category</label>
                                <select id="product_category" name="product_category" style="background-color: #222a42; color: white;" required class="form-control">
                                    <option value="">Select Product Category</option>
                                    <option value="1" <?php if($row['product_cat'] == '1') echo 'selected'; ?>>Gym Equipment</option>
                                    <option value="2" <?php if($row['product_cat'] == '2') echo 'selected'; ?>>Gym Wear</option>
                                    <option value="3" <?php if($row['product_cat'] == '3') echo 'selected'; ?>>Gym Nutrition</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_brand">Product Brand</label>
                                <select id="product_brand" name="product_brand" style="background-color: #222a42; color: white;" required class="form-control">
                                    <option value="">Select Product Brand</option>
                                    <option value="1" <?php if($row['product_brand'] == '1') echo 'selected'; ?>>Muscle Blaze</option>
                                    <option value="2" <?php if($row['product_brand'] == '2') echo 'selected'; ?>>GNC</option>
                                    <option value="3" <?php if($row['product_brand'] == '3') echo 'selected'; ?>>Nutrabay</option>
                                    <option value="4" <?php if($row['product_brand'] == '4') echo 'selected'; ?>>MuscleTech</option>
                                    <option value="5" <?php if($row['product_brand'] == '5') echo 'selected'; ?>>Equipment</option>
                                    <option value="6" <?php if($row['product_brand'] == '6') echo 'selected'; ?>>Clothing</option>
                                    <!-- Add your brand options here -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" name="product_image" id="product_image" class="form-control">
                                <p>Current Image1: <img src="product_image/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_image']; ?>" width="100"></p>
                            </div>
                            <div class="form-group">
                                <label for="product_image2">Product Image 2</label>
                                <input type="file" name="product_image2" id="product_image2" class="form-control">
                                <p>Current Image2: <img src="product_image/<?php echo $row['product_image2']; ?>"alt="<?php echo $row['product_image2']; ?>"  width="100"></p>
                            </div>
                            <div class="form-group">
                                <label for="stock_qty">Stock Quantity</label>
                                <input type="number" name="stock_qty" id="stock_qty" class="form-control" value="<?php echo $row['stock_qty']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="product_keywords">Product Keywords</label>
                                <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $row['product_keywords']; ?>">
                            </div>
                            <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
