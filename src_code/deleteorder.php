<?php
// Include database connection
include "db.php";

// Check if order_id is set in the URL
if(isset($_GET['order_id'])) {
    // Sanitize the input to prevent SQL injection
    $order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
    
    // Delete the order from the database
    $delete_order_query = "DELETE FROM orders WHERE order_id = '$order_id'";
    $result = mysqli_query($conn, $delete_order_query);

    if($result) {
        // Order deleted successfully, redirect back to the page where orders are displayed
        echo "<script>alert('YOUR ORDER HAS BEEN CANCELLED SUCCESFULLY');</script>";
        header("Location: profile.php");
        exit();
    } else {
        // Error occurred while deleting the order
        echo "Error: Unable to delete the order.";
    }
} else {
    // Redirect to the page where orders are displayed if order_id is not set in the URL
    header("Location: profile.php");
    exit();
}
?>
