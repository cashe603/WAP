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
    <li class='active'><a href='#'><h4>Categories</h4></a></li>
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

	

if(isset($_POST["brand"])){
    $brand_query = "SELECT brand_id, brand_title FROM brands";

if ($stmt = mysqli_prepare($con, $brand_query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    echo "
    <div class='nav nav-pills nav-stacked'>
    <li class='active'><a href='#'><h4>Brands</h4></a></li>
	";

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $bid, $bname);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        
    
    echo "
        <li><a href='#' class='category' cid='$bid'>$bname</a></li>
			";
		}
		echo "</div>";

    
    } 

}

if(isset($_POST["getProduct"])){
    $product_query = "SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products ORDER BY RAND() LIMIT 0,6";

if ($stmt = mysqli_prepare($con, $product_query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    }
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
                            echo"
                            <div class='col-md-4'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='200' width='200' />
                                    </div>    
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button class = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }


		
		


?>
