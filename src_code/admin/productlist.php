<?php
session_start();
include("db.php");
error_reporting(0);

// Handle product deletion
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $product_id = $_GET['product_id'];

    // Delete product image
    $result = mysqli_query($conn,"SELECT product_image FROM products WHERE product_id='$product_id'");
    list($picture) = mysqli_fetch_array($result);
    $path = "product_images/$picture";
    if(file_exists($path)) {
        unlink($path);
    }

    // Delete product from database
    $query = "DELETE FROM products WHERE product_id='$product_id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "<script>alert('Product Has Been Deleted  Successfully');</script>";
}

// Retrieve products based on category and brand
$category = isset($_GET['product_category']) ? $_GET['product_category'] : '';
$brand = isset($_GET['product_brand']) ? $_GET['product_brand'] : '';

// Pagination
$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$query = "SELECT p.product_id, p.product_image, p.product_title, p.product_price, p.stock_qty FROM products p WHERE 1=1";
if(!empty($category)) {
    $query .= " AND p.product_cat='$category'";
}
if(!empty($brand)) {
    $query .= " AND p.product_brand='$brand'";
}

$query .= " LIMIT $start, $limit";

$result = mysqli_query($conn, $query) or die ("Query incorrect.....");

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Products List</h4>
                </div>
                <div class="card-body">
                    <!-- Dropdowns to select category and brand -->
                    <form method="GET">
                        <div class="form-group">
                            <label for="product_category">Select Category:</label>
                            <select name="product_category" id="product_category" style="background-color: #222a42; color: white;" class="form-control">
                                <!-- Populate with category options from database -->
                                <option value="">All Categories</option>
                                <option value="1" <?php if($category == '1') echo 'selected'; ?>>Gym Equipment</option>
                                <option value="2" <?php if($category == '2') echo 'selected'; ?>>Gym Wear</option>
                                <option value="3" <?php if($category == '3') echo 'selected'; ?>>Gym Nutrition</option>
                            </select>
                        </div>
                        <p>OR</p>
                        <div class="form-group">
                            <label for="product_brand">Select Brand:</label>
                            <select name="product_brand" id="product_brand" style="background-color: #222a42; color: white;" class="form-control">
                                <!-- Populate with brand options from database -->
                                <option value="">Brands</option>
                                <option value="1" <?php if($brand == '1') echo 'selected'; ?>>Muscle Blaze</option>
                                <option value="2" <?php if($brand == '2') echo 'selected'; ?>>GNC</option>
                                <option value="3" <?php if($brand == '3') echo 'selected'; ?>>Nutrabay</option>
                                <option value="4" <?php if($brand == '4') echo 'selected'; ?>>MuscleTech</option>
                                <option value="5" <?php if($brand == '5') echo 'selected'; ?>>Equipment</option>
                                <option value="6" <?php if($brand == '6') echo 'selected'; ?>>Clothing</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <br>
                        <br>
                       
                    </form>
                    <a href="addproduct.php" class="btn btn-success">Add Product</a>
                  
                    <!-- Display products -->
                    <div class="table-responsive ps">
                        <table class="table tablesorter" id="page1">
                            <thead class="text-primary">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_array($result)): ?>
                                    <tr>
                                        <td><img src="../product_images/<?php echo $row['product_image']; ?>" style="width:50px; height:50px; border:groove #000"></td>
                                        <td><?php echo $row['product_title']; ?></td>
                                        <td><?php echo $row['product_price']; ?></td>
                                        <td><?php echo $row['stock_qty']; ?></td>
                                        <td>
                                            <a class="btn btn-success" href="editproduct.php?product_id=<?php echo $row['product_id']; ?>">Edit</a>
                                            <a class="btn btn-danger" href="productlist.php?product_id=<?php echo $row['product_id']; ?>&action=delete">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <?php
                    // Count total number of records
                    $result_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products") or die(mysqli_error($conn));
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_records = $row_count['total'];

                    // Calculate total pages
                    $total_pages = ceil($total_records / $limit);

                    // Previous page link
                    $prev_page = $page - 1;
                    if($prev_page >= 1) {
                        echo "<a href='?page=$prev_page&product_category=$category&product_brand=$brand'style='color: #007bff;padding: 8px 16px;
                        text-decoration: none;
                        border: 1px solid #007bff;
                        margin: 0 4px;
                        border-radius: 5px;'>Previous</a>";
                    }

                    // Page links
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='?page=$i&product_category=$category&product_brand=$brand' style=' color: #007bff;
                        padding: 10px 12px;
                        text-decoration: none;
                        border: 1px solid #007bff;
                        margin: 0 4px;
                        border-radius: 5px;
                        font-size: 16px;'>$i</a>";
                    }

                    // Next page link
                    $next_page = $page + 1;
                    if($next_page <= $total_pages) {
                        echo "<a href='?page=$next_page&product_category=$category&product_brand=$brand' style=' color: #007bff;
                        padding: 8px 16px;
                        text-decoration: none;
                        border: 1px solid #007bff;
                        margin: 0 4px;
                        border-radius: 5px;'>Next</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
