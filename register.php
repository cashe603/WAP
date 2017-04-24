<?php
include("config.php");
//`id`, `username`, `password`, `email`, `name`, `country`, `city`, `address`, `zip`

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$country =$_POST['country'];
$city = $_POST['city'];
$address =$_POST['address'];
$zip = $_POST['zip'];


$usernameValidation = "/^[a-z0-9_-]{3,15}$/";

$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})/";

$nameValidation = "/^[a-zA-Z ]+$/";

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

$city_preg = "/^[a-zA-Z ]+$/";

$address_preg = "/[A-Za-z0-9]+/";

$zip_preg= "/^\d{5}([\-]?\d{4})?$/";


//validating username

    if(!preg_match($usernameValidation,$username)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Username is Invalid..Between 3 to 15 characters, uppercase is not allowed!</b>
			</div>
		";
		exit();
	}
	
//validating password

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>This Password is too weak! Required > Minimum length:8 Use Uppercase and Lowercase Letter, Numbers..!</b>
			</div>
		";
		exit();
	}	
	
//validating email

    if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$email is not a valid email address..!</b>
			</div>
		";
		exit();
	}
//validating name

if(!preg_match($nameValidation,$name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Name is Invalid..!</b>
			</div>
		";
		exit();
	}



//country validation 

    if(isset($_POST['country']) && $_POST['country'] == '0') {  
    echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Select a Country!</b>
			</div>
		";
		exit(); 
    }         
            
//city validation
            
    if(!preg_match($city_preg,$city)) {
        echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>City Mismatch!</b>
			</div>
		";
		exit();
            
	}
	
//address validation	
    
    if(!preg_match($address_preg,$address)) {
        echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Address cannot contain special chars</b>
			</div>
		";
		exit();
            
	}
	
//zip code verificiation

    if(!preg_match($zip_preg,$zip)) {
        echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Zip code Mismatch</b>
			</div>
		";
		exit();
            
	}
	

	
$sql = "SELECT id FROM users WHERE email = ? LIMIT 1" ;
	$stmt = $con->prepare($sql);
	$stmt->bind_param("s", $email);
	$id = "id";
	
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

		
    $sql = "INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `country`, `city`, `address`, `zip`) VALUES (?, ? , MD5(?) , ?, ?, ?, ?, ?, ?)";

		if ($stmt= $con->prepare($sql)) {
                    $stmt->bind_param("issssssss",$var1, $username, $password, $email, $name, $country, $city, $address, $zip);
                    
                    $var1 = null;
                    
                    $stmt->execute();
                    echo '<script language="javascript">';
                    echo 'alert("Registation Successful"); window.location = "index.php";';
                    echo '</script>';
										

			echo "

				<div class='alert alert-success'>

					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b>You are Registered successfully..!</b>

				</div>

			";
            
        }    
    }	
