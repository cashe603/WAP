<?php
session_start();
include "config.php";

if(isset($_POST["category"])){
    $query = "SELECT cat_id, cat_title FROM categories";

if ($stmt = mysqli_prepare($con, $query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    echo "
    <div class='nav nav-pills nav-stacked'>
    <li class='active'><a href='#'><h4>Brands</h4></a></li>
	";

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $cid, $cname);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        
    
    echo "
        <li><a href='#' class='category' cid='$cid'>$cname</a></li>
			";
		}
		echo "</div>";

    
    } 

}

	

if(isset($_POST["category"])){
    $query = "SELECT cat_id, cat_title FROM categories";

if ($stmt = mysqli_prepare($con, $query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    echo "
    <div class='nav nav-pills nav-stacked'>
    <li class='active'><a href='#'><h4>Brands</h4></a></li>
	";

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $cid, $cname);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        
    
    echo "
        <li><a href='#' class='category' cid='$bid'>$cname</a></li>
			";
		}
		echo "</div>";

    
    } 

}


?>
