<?php
session_start();
require_once("config.php");

if(isset($_POST["username"])){
 
	$username = $_POST['username'];
	$password = MD5($_POST['password']);

        $stmt=$con->prepare("SELECT * from users WHERE username LIKE ? AND password LIKE ? LIMIT 1");
	$stmt->bind_param("ss", $username, $password);
	
	$stmt->execute();
	$result = $stmt->get_result();
        $num_rows = $result->num_rows;
				if($num_rows >= 1) {
            $row = $result->fetch_assoc();
            $_SESSION['uid'] = $row['id'];
            $_SESSION['loggedin'] = $username;
            $_SESSION['name'] = $row['name'];
      }  
      else  {  
           echo "No";
      }  
}

