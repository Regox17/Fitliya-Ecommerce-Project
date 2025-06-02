<?php
session_start();
include("db.php");

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete') {
    $order_id = $_GET['order_id'];

    // Retrieve the product ID and quantity of the order being deleted
    $order_info = mysqli_query($conn, "SELECT product_id, quantity FROM orders WHERE order_id='$order_id'");
    $order_data = mysqli_fetch_assoc($order_info);
    $product_id = $order_data['product_id'];
    $quantity = $order_data['quantity'];

    // Increment the stock_qty of the corresponding product in the products table
    $update_product_stock_sql = "UPDATE products SET stock_qty = stock_qty + '$quantity' WHERE product_id = '$product_id'";
    mysqli_query($conn, $update_product_stock_sql);

    // Delete the order
    mysqli_query($conn,"DELETE FROM orders WHERE order_id='$order_id'") or die("Delete query is incorrect...");
    echo "<script>alert('Order Has Been Cancelled Successfully');</script>";
}

if(isset($_POST['update_delivery_date'])) {
    $order_id = $_POST['order_id'];
    $new_delivery_date = $_POST['new_delivery_date'];

    // Update the delivery date of the order
    $update_delivery_date_sql = "UPDATE orders SET delivery_date = '$new_delivery_date' WHERE order_id = '$order_id'";
    mysqli_query($conn, $update_delivery_date_sql);
    echo "<script>alert('Updated successfully');</script>";
}

// Pagination
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch orders with pagination
$query = "SELECT order_id, product_title, first_name, mobile, email, address1, address2, product_price, quantity, order_date, delivery_date 
          FROM orders 
          INNER JOIN products ON orders.product_id = products.product_id 
          INNER JOIN user_info ON user_info.user_id = orders.user_id 
          LIMIT $start, $limit";
$result = mysqli_query($conn, $query) or die("Query incorrect.");

// Fetch total records for pagination
$result_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders") or die(mysqli_error($conn));
$row_count = mysqli_fetch_assoc($result_count);
$total_records = $row_count['total'];
$total_pages = ceil($total_records / $limit);

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Orders / Page <?php echo $page; ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter">
                            <thead class="text-primary">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Products</th>
                                    <th>Contact | Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Date of Order</th>
                                    <th>Delivery Date</th>
                                    <th>Update Delivery Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while ($row = mysqli_fetch_assoc($result)) {    
                                    echo "<tr>";
                                    echo "<td>{$row['first_name']}</td>";
                                    echo "<td>". (strlen($row['product_title']) > 20 ? substr($row['product_title'], 0, 20) . "..." : $row['product_title']) . "</td>";
                                    echo "<td>{$row['email']}<br>{$row['mobile']}</td>";
                                    echo "<td>{$row['address1']}</td>";
                                    echo "<td>{$row['address2']}</td>";
                                    echo "<td>{$row['product_price']}</td>";
                                    echo "<td>{$row['quantity']}</td>";
                                    echo "<td>{$row['order_date']}</td>";
                                    echo "<td>{$row['delivery_date']}</td>";

                                    // Form to update delivery date
                                    echo "<td>
                                            <form method='post'>
                                                <input type='hidden' name='order_id' value='{$row['order_id']}'>
                                                <input type='date' name='new_delivery_date' value='{$row['delivery_date']}'>
                                                <input type='submit' name='update_delivery_date' value='Update'>
                                            </form>
                                        </td>";

                                    echo "<td><a class='btn btn-danger' href='orders.php?order_id={$row['order_id']}&action=delete'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                // Previous page link
                                $prev_page = $page - 1;
                                if($prev_page >= 1) {
                                    echo "<li class='page-item'><a class='page-link' href='orders.php?page=$prev_page'>Previous</a></li>";
                                }

                                // Page links
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    $active = ($i == $page) ? "active" : "";
                                    echo "<li class='page-item $active'><a class='page-link' href='orders.php?page=$i'>$i</a></li>";
                                }

                                // Next page link
                                $next_page = $page + 1;
                                if($next_page <= $total_pages) {
                                    echo "<li class='page-item'><a class='page-link' href='orders.php?page=$next_page'>Next</a></li>";
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "footer.php";
?>
