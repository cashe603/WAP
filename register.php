<?php
include("config.php");

$c_name = $_POST['c_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$country =$_POST['select_country'];
$city = $_POST['city'];
$address =$_POST['address'];
$zip = $_POST['zip'];


$nameValidation = "/^[a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})/";
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);



    if(!preg_match($nameValidation,$c_name)){
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
	
$sql = "SELECT customer_id FROM customers WHERE customer_email = ? LIMIT 1" ;
	$stmt = $con->prepare($sql);
	$stmt->bind_param("s", $email);
	$id = "customer_id";
	
	$stmt->execute();
        
        $stmt->store_result();

	if($stmt->num_rows > 0){
		echo '<script language="javascript">';
    echo 'window.alert("Email Address Already exists")';
    echo '</script>';
		
		
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is Registered. Try Another email address</b>
			</div>
		";
		exit();
        }



	else {

		
		$sql = "INSERT INTO `customers` 

		(`customer_id`, `customer_name`, `customer_email`, `customer_pass`, 

		`customer_country`, `customer_city`, `customer_address`, `customer_zipcode`) 

		VALUES (?, ? , ? , ?, ?, ?, ?, ?)";

		if ($stmt= $con->prepare($sql)) {
                    $stmt->bind_param("ssssssss",$var1,$c_name,$email,$password,$country,$city,$address,$zip);
                    $password = sha1($_POST["customer_pass"]);
                    $var1 = null;
                    
                    $stmt->execute();
                    echo '<script language="javascript">';
                    echo 'alert("Registation Successful")';
                    echo '</script>';
		

			echo "

				<div class='alert alert-success'>

					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b>You are Registered successfully..!</b>

				</div>

			";
            
        }    
    }	
	
	
?>
