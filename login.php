<?php
session_start();
require_once("config.php");

if(isset($_POST["username"])){
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$uid = $_POST['id'];
 
	$stmt=$con->prepare("SELECT * from users WHERE username LIKE ? AND password LIKE ? LIMIT 1");
	$stmt->bind_param("ss", $username, $password);
	
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->fetch();
	
	if (mysqli_num_rows($result) > 0) {
                        
                        $_SESSION["id"]= $uid;
			$_SESSION["username"] = $username;

			
			
		  
           echo "welcome";
      }  
      else  {  
           echo "No";
      }  
   
 }
?>
