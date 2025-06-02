<?php

include "header.php";
include "db.php";
// Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION["uid"])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

// Check if the form is submitted
if (isset($_POST["confirm_order"])) {
    // Extract form data
    $user_id = $_SESSION["uid"];
    $total_amount = $_POST["total_amount"];
    $order_date = date("Y-m-d");
    $delivery_date = $_POST["delivery_date"]; // Extract delivery date from POST data
    $delivery_address = $_POST["address"]; 
    
    // Retrieve the order ID of the last inserted order
    $order_id = mysqli_insert_id($conn);
    
    // Retrieve cart items of the user
    $get_cart_items_sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $cart_items_result = mysqli_query($conn, $get_cart_items_sql);
    
    // Insert each cart item into order_details table
    while ($cart_item = mysqli_fetch_assoc($cart_items_result)) {
        $product_id = $cart_item["p_id"];
        $quantity = $cart_item["qty"];
        $insert_order_details_sql = "INSERT INTO orders (user_id, product_id, quantity, total_amount, order_date, delivery_date, delivery_address) VALUES ('$user_id', '$product_id', '$quantity', '$total_amount', '$order_date', '$delivery_date', '$delivery_address')";
        mysqli_query($conn, $insert_order_details_sql);

        $update_product_stock_sql = "UPDATE products SET stock_qty = stock_qty - '$quantity' WHERE product_id = '$product_id'";
        mysqli_query($conn, $update_product_stock_sql);
    }
    
    // Clear the user's cart after placing the order
    $clear_cart_sql = "DELETE FROM cart WHERE user_id = '$user_id'";
    mysqli_query($conn, $clear_cart_sql);
    echo "<script>alert('Order has been placed successfully');</script>";
    // Redirect to order confirmation page
    echo "<script>window.location.href='index.php'</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f8f9fa; /* Set background color */
            font-family: Arial, sans-serif; /* Set font family */
        }
        .container {
             /* Adjust top margin */
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Add box shadow */
        }
        .card-body {
            padding: 20px; /* Add padding */
        }
        .btn-primary {
            background-color: #007bff; /* Set primary button color */
            border: none; /* Remove border */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Set hover color */
        }
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2; /* Set header background color */
        }
        /* Style user details */
        .user-details-table {
            margin-top: 20px;
        }
        .user-details-table th {
            background-color: #007bff; /* Set header background color */
            color: #fff; /* Set header text color */
        }
        .user-details-table td {
            background-color: #f2f2f2; /* Set alternate row background color */
        }
        .user-details-table td:first-child {
            width: 30%; /* Set width for the first column */
            font-weight: bold; /* Make text bold */
        }
        /* Center the checkout heading */
        h2 {
            text-align: center;
        }
        .headerb {
        padding-top: 15px;
        text-align: center;
        padding-bottom: 15px;
        background:#2364aaff;
        font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <h1 style="text-align:center; text-decoration: underline; ">ORDER PAGE</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-md-8">
                <!-- Display the list of products ready for checkout -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_amount = 0;
                        $user_id = $_SESSION["uid"];
                        $get_cart_items_sql = "SELECT p.*, c.qty FROM products p INNER JOIN cart c ON p.product_id = c.p_id WHERE c.user_id = '$user_id'";
                        $cart_items_result = mysqli_query($conn, $get_cart_items_sql);
                        while ($cart_item = mysqli_fetch_assoc($cart_items_result)) {
                            $product_title = $cart_item["product_title"];
                            $product_price = $cart_item["product_price"];
                            $quantity = $cart_item["qty"];
                            $order_date = date("Y-m-d");
                            $delivery_date = date('Y-m-d', strtotime($order_date . ' + ' . rand(7, 20) . ' days'));
                            $subtotal = $product_price * $quantity;
                            $total_amount += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo $product_title; ?></td>
                                <td>Rs.<?php echo $product_price; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>Rs.<?php echo $subtotal; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3"><strong>Total Amount:</strong></td>
                            <td><strong>Rs.<?php echo $total_amount; ?></strong></td>
                        </tr>
                        
                        <tr>
                            <td colspan="3"><strong>Order Date:</strong></td>
                            <td><strong><?php echo $order_date; ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Delivery Date:</strong></td>
                            <td><strong><?php echo $delivery_date; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <!-- Display total amount and user details -->
                <div class="card">
                    <div class="card-body">
                       
                    <table class="user-details-table">
                        <tr>
                            <th colspan="2" class="headerb" >SHIPPING DETAILS</th>
                        </tr>
                        <!-- Display existing user details -->
                        <?php
                        $get_user_details_sql = "SELECT * FROM user_info WHERE user_id = '$user_id'";
                        $user_details_result = mysqli_query($conn, $get_user_details_sql);
                        $user_details = mysqli_fetch_assoc($user_details_result);
                        ?>
                        <tr>
                            <td colspan="2">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="address">Delivery Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $user_details['address1']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $user_details['address2']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact:</label>
                                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user_details['mobile']; ?>" required>
                                    </div>
                                    <!-- Hidden fields to pass total amount and delivery date -->
                                    <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
                                    <input type="hidden" name="delivery_date" value="<?php echo $delivery_date; ?>">
                                    <br>
                                    <button type="submit" name="confirm_order" style='margin-left:100px;' class="btn btn-primary">Confirm Order</button>
                                </form>
                            </td>
                        </tr>
                    </table>

                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Add your JavaScript links here -->
</body>
</html>
<?php

include "footer.php";
?>
