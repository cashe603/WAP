<?php
session_start();
include "config.php";

if(isset($_POST["category"])){
    $query = "SELECT cat_id, cat_title FROM categories";

if ($stmt = mysqli_prepare($con, $query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    echo "
    <ul class='nav nav-pills nav-stacked'role='tablist'>
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
		echo "</ul>";

    
    } 

}

	

if(isset($_POST["brand"])){
    $brand_query = "SELECT brand_id, brand_title FROM brands";

if ($stmt = mysqli_prepare($con, $brand_query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    echo "
    <ul class='nav nav-pills nav-stacked' role='tablist'>
    <li class='active'><a href='#'><h4>Brands</h4></a></li>
	";

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $bid, $bname);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        
    
    echo "
        <li><a href='#' class='brand' bid='$bid'>$bname</a></li>
			";
		}
		echo "</ul>";

    
    } 

}

if(isset($_POST["getProduct"])){
    $product_query = "SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords, product_subdesc FROM products ORDER BY RAND() LIMIT 0,6";

if ($stmt = mysqli_prepare($con, $product_query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);
    
    }
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords, $psubdesc);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
                            echo"
                            <div class='col-md-4'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='190' width='200' />
                                        <p>$psubdesc</p>
                                    </div>    
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button p_id = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }
            

if(isset($_POST["get_selected_Category"])){
    $cid = $_POST['cat_id'];
    $pro_query = "SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_cat='$cid'";

if ($stmt = mysqli_prepare($con, $pro_query)) {

   
    mysqli_stmt_execute($stmt);
    
    }
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    /* now you can fetch the results into an array - NICE */
    while (mysqli_stmt_fetch($stmt)) {

                            echo"
                            <div class='col-md-6'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='250' width='250' />
                                        </div>
                                        <div class = 'well well-sm'>$pdesc</p>
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button p_id = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }
            
if(isset($_POST["selectBrand"])){
    $bid = $_POST['brand_id'];
    $pro_query = "SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_brand='$bid'";

if ($stmt = mysqli_prepare($con, $pro_query)) {

   
    mysqli_stmt_execute($stmt);
    
    }
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    /* now you can fetch the results into an array - NICE */
    while (mysqli_stmt_fetch($stmt)) {

                            echo"
                            <div class='col-md-6'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='250' width='250' />
                                    </div>
                                    <div class = 'well well-sm'>$pdesc</div>
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button p_id = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }


if(isset($_POST["search"])){
    $pkeywords = $_POST['pkeywords'];
    $search_query = "SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_keywords LIKE '%$pkeywords%'";

    
    $stmt = $con->prepare($search_query);
    $stmt->bind_param("iiisisss", $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);
    $stmt->execute();
    $stmt->store_result();
    
    
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    if($stmt->affected_rows > 0){
    
    while (mysqli_stmt_fetch($stmt)) {

                            echo"
                            <div class='col-md-6'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='300' width='300' />
                                    </div>
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button p_id = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }
            
    else{
        echo"No Such Product";
        
        }
            
       } 

            
            

?>
