<?php
session_start();
include "config.php";

if(isset($_POST["category"])){
    $query = "SELECT cat_id, cat_title FROM categories";

    $stmt =$con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($cid, $cname);
    
    echo "
    <ul class='nav nav-pills nav-stacked'role='tablist'>
    <li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
    

     while ($stmt->fetch()) {
    
    echo "
        <li><a href='#' class='category' cid='$cid'>$cname</a></li>
			";
		}
		echo "</ul>";
		
        $stmt->close();
    
    } 

if(isset($_POST["brand"])){
    if ($stmt = $con->prepare("SELECT brand_id, brand_title FROM brands")){
    /* execute statement */
    
    $stmt->execute();
    $stmt->bind_result($bid, $bname);
    
    
    echo "
    <ul class='nav nav-pills nav-stacked' role='tablist'>
    <li class='active'><a href='#'><h4>Brands</h4></a></li>
	";

    while ($stmt->fetch()) {    
    
    echo "
        <li><a href='#' class='brand' bid='$bid'>$bname</a></li>
			";
		}
		echo "</ul>";

    
    } $stmt->close();
}


if(isset($_POST["getProduct"])){
    if ($stmt = $con->prepare ("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords, product_subdesc FROM products ORDER BY RAND() LIMIT 0,6")){
    
    $stmt->execute();
    $stmt->bind_result($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords, $psubdesc);

    while ($stmt->fetch()) {
                            echo"
                            <div class='col-md-4'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='200' width='200' />
                                        <p>$psubdesc</p>
                                    </div>    
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button p_id = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }$stmt->close();
    }        
            

if(isset($_POST["get_selected_Category"])){
    $cid = $_POST['cat_id'];
    if ($stmt = $con->prepare ("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_cat='$cid'")){
    
    $stmt->execute();
    $stmt->bind_result($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    while ($stmt->fetch()) {

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
            
    }        
            
if(isset($_POST["selectBrand"])){
    $bid = $_POST['brand_id'];
    if ($stmt = $con->prepare ("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_cat='$bid'")){
    
    $stmt->execute();
    $stmt->bind_result($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    while ($stmt->fetch()) {

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
            
    }        


if(isset($_POST["search"])){
    $pkeywords = $_POST['pkeywords'];
    if ($stmt = $con->prepare("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_keywords LIKE '%$pkeywords%'")){

    $stmt->bind_param("iiisisss", $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

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
        echo '<script language="javascript">';
                    echo 'alert("No Such Product Exists")';
                    echo '</script>';
		
        header("Location: index.php"); /* Redirect browser */
        exit();
        
        }
            
       }
   }    

            
            

?>
