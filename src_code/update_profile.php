<?php

include "db.php"; // Include your database connection file
include 'profile.php';
if(isset($_SESSION["uid"])) {
    if(isset($_POST["update_profile"])) {
        // Extract form data
        $user_id = $_SESSION["uid"];
        $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
        $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
        $address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
        $address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
        $state = mysqli_real_escape_string($conn, $_POST["state"]);

        // Update user details in the database
        $update_query = "UPDATE user_info SET first_name='$first_name', last_name='$last_name', email='$email', mobile='$mobile', address1='$address1', address2='$address2',state='$state' WHERE user_id='$user_id'";
        $update_result = mysqli_query($conn, $update_query);

        if($update_result) {
            echo "<script>alert('User details updated successfully');</script>";
            echo "<script>location.href='profile.php'</script>"; // Redirect to profile page after successful update
        } else {
            echo "<script>alert('Failed to update user details');</script>";
            echo "<script>location.href='profile.php'</script>"; // Redirect to profile page after failed update
        }
    } else {
        echo "<script>location.href='profile.php'</script>"; // Redirect to profile page if form is not submitted
    }
} else {
    echo "<p>User not logged in.</p>";
}
?>
