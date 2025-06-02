<?php
    include "header.php";
?>

<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }
    .container1 {
        max-width: 1300px;
        height:100%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .center {
        display: block;
        margin:center;
       
        text-align: center;
        justify-content:center;
        font-size:15px;
    }
    .centerr {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        font-size:20px;
    }
    .headerb {
    padding-top: 15px;
    text-align: center;
    padding-bottom: 15px;
    background: #6199c7;
    font-size: 25px;
    text-align: center;

    }
    .var
    {
      
        margin-right: auto;
    }
    .header {
        padding: 60px;
        text-align: center;
        background: #6199c7;
        color: white;
        font-size: 30px;
    }
    .user-info {
        margin-bottom: 40px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
    }
    .user-info p {
        margin: 10px 0;
    }
    .order-progress {
        margin-top: 20px;
    }
    .order-status {
        font-weight: bold;
    }
    .table {
        border-collapse: collapse;
        width: 100%;
    }
    .th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .th {
        background-color: #f2f2f2;
    }
    .course-card {
        width: 100%px;
        height: 100%px;
        background-color: #f0f0f0;
    
        text-align:center:
        display: inline-block;
        cursor: pointer;
        border-radius: 10px;
        overflow: hidden;
    }
    .course-cardb{
        width: 100%px;
        height: 100%px;
        background-color: #f0f0f0;
        margin: 20px;
        display: inline-block;
        cursor: pointer;
        border-radius: 10px;
        overflow: hidden;
        font-size: 10px;
    }
    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        .container1 {
            padding: 10px;
        }
        h1 {
            font-size: 24px;
        }
        .user-info, .order-progress {
            padding: 15px;
        }
    }
    .form {
    display: table;
    margin: 0 auto;
}
.form label {
    display: table-row;
}
.form input {
    display: table-cell;
    padding: 5px;
}
.form buttonu {
    float: right;

}

.updateButton {
    font-size: 8px; /* Reduce button font size */
    padding: 6px 9px; /* Adjust button padding */
    display: center; /* Make button a block element */
    margin: 0 auto; /* Center the button horizontally */
    margin-top: 20px; /* Add some top margin */
}
.delete-button {
display: inline-block;
padding: 3px 9px;
background-color: #ff5f5f;
color: white;
border: none;
border-radius: 5px;
text-decoration: none;
cursor: pointer;
}

.delete-button:hover {
background-color: #ff3b3b;
}
.edit-button {
    padding: 8px 20px; /* Adjust padding */
background-color: #4CAF50; /* Green background color */
color: white;
border: none;
border-radius: 3px;
cursor: pointer;
font-size: 16px; /* Adjust font size */
margin-left: 50px; /* Adjust margin to the left */
}

.edit-button:hover {
background-color: #45a049; /* Darker green background color on hover */
}

</style>

<script>

function toggleEdit() {
    var viewMode = document.getElementById("viewMode");
    var editMode = document.getElementById("editMode");

    if (viewMode.style.display === "block") {
        viewMode.style.display = "none";
        editMode.style.display = "block";
    } else {
        viewMode.style.display = "block";
        editMode.style.display = "none";
    }
}

</script>
<body>

<div class="container1">

<?php
include "db.php";       

if(isset($_SESSION["uid"])) {
    // Fetch user information
    $user_query = "SELECT * FROM user_info WHERE user_id ='$_SESSION[uid]'";
    $run_query = mysqli_query($conn, $user_query);
    
    if (!$run_query) {
        die("User query failed: " . mysqli_error($conn));
    }
    
    if(mysqli_num_rows($run_query) > 0) {
        $user_row = $run_query->fetch_assoc();
    }
?>
    <div class="header">
        <h1>PROFILE</h1>
    </div>
    
    <!-- Display user details -->
   
    <!-- Edit user details form -->
    <div class="section">
        <div class="container">
            <div class='var'>
                <div class="course-card">
                <div class="center">

                    <!-- View mode -->
                    <div id="viewMode" style="display: block;"> 
                    <form>
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            
                            <input type="text" id="first_name" name="first_name" value="<?php echo $user_row['first_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" value="<?php echo $user_row['last_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $user_row['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No:</label>
                            <input type="text" id="mobile" name="mobile" value="<?php echo $user_row['mobile']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address1">Address:</label>
                            <input type="text" id="address1" name="address1" value="<?php echo $user_row['address1']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address2">City:</label>
                            <input type="text" id="address2" name="address2" value="<?php echo $user_row['address2']; ?>" readonly>
                        </div>
                        <div class="form-group">
                                <label for="address2">State:</label>
                                <input type="text" id="state" name="state" value="<?php echo $user_row['state']; ?>"readonly>
                            </div>
                    </form>
                    <button onclick="toggleEdit()" class="edit-button">Edit</button>
                   </div>

                    <!-- Edit mode -->
                    <div id="editMode" style="display: none;"> 
                        <form action="update_profile.php" method="POST">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" id="first_name" name="first_name" value="<?php echo $user_row['first_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" value="<?php echo $user_row['last_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="<?php echo $user_row['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile No:</label>
                                <input type="text" id="mobile" name="mobile" value="<?php echo $user_row['mobile']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address1">Address:</label>
                                <input type="text" id="address1" name="address1" value="<?php echo $user_row['address1']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address2">City:</label>
                                <input type="text" id="address2" name="address2" value="<?php echo $user_row['address2']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address2">State:</label>
                                <input type="text" id="state" name="state" value="<?php echo $user_row['state']; ?>">
                            </div>
                            <button type="submit" name="update_profile" id="update_Button" class="edit-button">Update</button>
                            <button type="button" onclick="toggleEdit()" class="edit-button">Cancel</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h2 class ="headerb">ORDER SUMMARY</h2>
    <br>
       <?php
    // Include database connection
    
    $order_query = "SELECT * FROM orders WHERE user_id = '$_SESSION[uid]'";
    $order_result = mysqli_query($conn, $order_query);

    if(mysqli_num_rows($order_result) > 0) {
        // Display orders in a table
        echo '<div style="margin: 0 auto; width: 80%; text-align:center;">'; // Center the table on the page
        echo '<table border="1" style="width: 100%;">'; // Set table width to 100%
        echo '<tr>
                <th style="text-align:center;">Order ID</th>
                <th style="text-align:center;">Product Name</th>
                <th style="text-align:center;">Quantity</th>
                <th style="text-align:center;">Date Of Order</th>
                <th style="text-align:center;">Date Of Delivery</th>
                <th style="text-align:center;">Address </th>
                <th style="text-align:center;">Cancel Order</th>
                
              </tr>';

              while($order_row = mysqli_fetch_assoc($order_result)) {
                $order_id = $order_row['order_id'];
                $product_id = $order_row['product_id'];
                $quantity = $order_row['quantity'];
                $orderdate = $order_row['order_date'];
                $deliverydate = $order_row['delivery_date'];
                $delivery_address = $order_row['delivery_address']; // New variable for delivery address
                
                // Fetch product name from product table
                $product_query = "SELECT product_title FROM products WHERE product_id = '$product_id'";
                $product_result = mysqli_query($conn, $product_query);
                $product_row = mysqli_fetch_assoc($product_result);
                $product_name = $product_row['product_title'];
            
                // Display order details
                echo '<tr>';
                echo '<td>' . $order_id . '</td>';
                echo '<td>' . $product_name . '</td>';
                echo '<td>' . $quantity . '</td>';
                echo '<td>' . $orderdate . '</td>';
                echo '<td>' . $deliverydate . '</td>';
                echo '<td>' . $delivery_address . '</td>'; // Display delivery address
                echo '<td><a href="deleteorder.php?order_id=' . $order_id . '" class="delete-button" onclick="return confirm(\'Are you sure you want to cancel this order?\')">Cancel</a></td>';
                echo '</tr>';
            }
        echo '</table>';
        echo '</div>';
    } else {
        echo "<p style='text-align:center; font-size:40px;'>Orders Not Yet Placed</p>";
    }
    } else {
        echo "<p>User not logged in.</p>";
    }
    ?>

</div>
</div>
</body>

<?php
include "footer.php";
?>
