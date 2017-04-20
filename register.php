<?php
include("config.php");

$c_name = $_POST['c_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$country =$_POST['select_country'];
$city = $_POST['city'];
$address = $_POST['address'];
$zip = $_POST['zip'];


$name = "/^[a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})/";
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);



    if(!preg_match($name,$c_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Name is Invalid..!</b>
			</div>
		";
		exit();
	}
    if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$email is not a valid email address..!</b>
			</div>
		";
		exit();
	}

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>This Password is too weak! Required > Minimum length:8 Use Uppercase and Lowercase Letter, Numbers..!</b>
			</div>
		";
		exit();
	}
    if(isset($_POST['select_country']) && $_POST['select_country'] == '0') {  
    echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Select a Country!</b>
			</div>
		";
		exit(); 
    }         
            
	
    if(empty($city) ||empty($address) ||empty($zip)) {
    echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Enter your full address including zip/postal code</b>
			</div>
		";
		exit();
            
	}
	
    //existing email address in our database
	$sql = "SELECT customer_id FROM customers WHERE customer_email = '$email' LIMIT 1" ;
	$stmt = $con->prepare($sql);
	$stmt->execute();
        $stmt->store_result();
	
	if($stmt->affected_rows > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is Registered. Try Another email address</b>
			</div>
		";
		exit();
	

}


	
?>