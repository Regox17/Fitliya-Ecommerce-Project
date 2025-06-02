<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$state = $_POST['state'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1) || empty($address2)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLEASE FILL ALL THE FIELDS!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>THIS $f_name IS NOT VALID!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>THIS $l_name IS NOT VALID!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>THIS $email IS NOT VALID!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>PASSWORD IS WEAK</b>
			</div>
		";
		exit();
	}

	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>BOTH PASSWORD IS NOT SAME</b>
			</div>
		";
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>MOBILE NUMBER $mobile IS NOT VALID</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>MOBILE NUMBER SOULD BE OF 10 DIGITS</b>
			</div>
		";
		exit();
	}
	$check_query = "SELECT * FROM user_info WHERE mobile = '$mobile' AND email != '$email'";
	$check_result = mysqli_query($conn, $check_query);

	if (mysqli_num_rows($check_result) > 0) {
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>MOBILE NUMBER $mobile IS ALREADY ASSOCIATED WITH ANOTHER EMAIL!</b>
			</div>
		";
		exit();
	}
	if(substr($mobile, 0, 1) == '0'){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>MOBILE NUMBER SHOULD NOT START WITH 0</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($conn,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>EMAIL ADDRESS ALREADY EXIST TRY ANOTHER EMAIL ADDRESS</b>
			</div>
		";
		exit();
	} 
	else {
	$sql = "INSERT INTO user_info (`user_id`, `first_name`, `last_name`, `email`,`password`, `mobile`, `address1`, `address2`,`state`) VALUES (NULL, '$f_name', '$l_name', '$email', '$password', '$mobile', '$address1', '$address2','$state')";
	$run_query = mysqli_query($conn,$sql);
	$_SESSION["uid"] = mysqli_insert_id($conn);
	$_SESSION["name"] = $f_name;
	$ip_add = getenv("REMOTE_ADDR");
	$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
	if(mysqli_query($conn,$sql)){
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Register_Success</b>
			</div>
		";
		echo "register_success";
		sleep(2);
		echo "<script> location.href='store.php'; </script>";
        exit;
		
		}
	}
	}
}