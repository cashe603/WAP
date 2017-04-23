<?php
session_start();
include "config.php";

if(isset($_POST["category"])){
    $query = "SELECT * FROM categories WHERE 'cat_id'=? AND 'cat_title'=?";

    $stmt =$con->prepare($query);
    
    $cid = "cat_id";
    $cname= "cat_title";

    $stmt->bind_param("is", $cid,$cname);
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
    if ($stmt = $con->prepare("SELECT * FROM brands where 'brand_id'=? AND 'brand_title'=?")){
    
    $bid = "brand_id";
    $bname= "brand_title";
    
    $stmt->bind_param("is", $bid,$bname);
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

    
    } 
}


if(isset($_POST["getProduct"])){
    if ($stmt = $con->prepare ("SELECT * FROM products WHERE 'product_id'=? AND 'product_cat'=? AND 'product_brand'=? AND 'product_title'=? AND 'product_price'=? AND 'product_desc'=? AND 'product_image'=? AND 'product_keywords'=? AND 'product_subdesc'=? ORDER BY RAND() LIMIT 0,6")){
    
    $pid= "product_id";
    $pcat= "product_cat";
    $pbrand = "product_brand";
    $ptitle = "product_title";
    $pprice = "product_price";
    $pdesc = "product_desc";
    $pimage = "product_image";
    $pkeywords = "product_keywords";
    $psubdesc = "product_subdesc";
    
    $stmt->bind_param("iiisissss", $pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords, $psubdesc);
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
    if ($stmt=$con->prepare ("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_cat=?")){
    $stmt->bind_param("i", $cid); 
    $cid = $_POST['cat_id'];

    $stmt->execute(); 
    $stmt->bind_result($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);
    while ($stmt->fetch()) {
                            echo"
                            <div class='col-md-6'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='300' width='320' />
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
    
    if ($stmt = $con->prepare ("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_brand=?")){
    
    $stmt->bind_param("i", $bid); 
    $bid = $_POST['brand_id'];

    
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
    $pkeywords = $con->real_escape_string($_POST['pkeywords']);
    if ($stmt = $con->prepare("SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products WHERE product_keywords LIKE '%$pkeywords%'")){

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkeywords);

    if($stmt->affected_rows > 0){
    
        while ($stmt->fetch()) {

                            echo"
                            <div class='col-md-6'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading'>$ptitle</div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pimage' height='350' width='400' />
                                    </div>
                                    <div class ='panel-heading'></div>$ $pprice
                                        <button p_id = '$pid' style ='float:right;' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }
            
    else{
        echo '<script>window.alert("No Such Product"); window.location = "index.php";</script>';
        
        }
            
       }
   }
   
    

?>
