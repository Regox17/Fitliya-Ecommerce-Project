<?php
session_start();
include "db.php";
if (isset($_POST["email"])) {
    $email = $_POST['email'];
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $msg = "First line of text\nSecond line of text";

							
    if(empty($email)){
        echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLEASE FILL THE GIVEN FIELD..!</b>
			</div>
		";
		exit();
    }else{
        if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>THIS $email IS NOT VALID!</b>
			</div>
		";
		exit();
	}
        $sql = "SELECT email_id FROM newsletter WHERE email = '$email' LIMIT 1" ;
        $check_query = mysqli_query($conn,$sql);
        $count_email = mysqli_num_rows($check_query);
        if($count_email > 0){
            echo "
                <div class='alert alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>EMAIL ALREADY EXIST!!</b>
                </div>
            ";
            exit();
        }else{
            
            $sql = "INSERT INTO `newsletter` 
            (`email_id`, `email`)
            VALUES (NULL, '$email')";
            $run_query = mysqli_query($conn,$sql);
                echo "<div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>THANKS FOR SUBSCRIBING!!</b>
                </div>";
                
                
            }

        
    }
    
}
?>