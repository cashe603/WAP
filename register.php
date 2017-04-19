<?php
include("config.php");

$c_name = $_POST['c_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$country = $_POST['country'];
$city = $_POST['city'];
$address = $_POST['address'];
$zip = $_POST['zip'];

if(empty($c_name) ||empty($email) || empty($password) ||empty($country) ||empty($city) ||empty($address) ||empty($zip)) {

    echo "
    <div class = 'alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Fill In The Required Fields</b>
    </div>
    ";
    }


?>