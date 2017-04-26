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
                                        <button p_id = '$pid' style ='float:right;' id='product' class='btn btn-danger btn-xs'>Add to Cart</button>
                                
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
                                        <button p_id = '$pid' style ='float:right;' id='product' class='btn btn-danger btn-xs'>Add to Cart</button>

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
                                        <button p_id = '$pid' style ='float:right;' id='product' class='btn btn-danger btn-xs'>Add to Cart</button>

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
                                        <img src='product_images/$pimage' height='350' width='350' />
                                    </div>
                                    <div class ='panel-heading'></div>$<b> $pprice </b>
                                        <button p_id = '$pid' style ='float:right;' id='product' class='btn btn-danger btn-xs'>Add to Cart</button>

                                </div>
                            </div>";    
                            
                            }

            }
            
    else{
        echo '<script>window.alert("No Such Product"); window.location = "index.php";</script>';
        
        }
            
       }
   }
   
if(isset($_POST["addProduct"])){
    if(isset($_SESSION["uid"])){

                $p_id = $_POST["proId"];
                $user_id = $_SESSION["uid"];
                $sql = "SELECT * FROM cart WHERE pro_id = ? AND user_id = ?";

		$stmt=$con->prepare($sql);
		$stmt->bind_param("ii", $p_id,$user_id);
		$stmt->execute();
		
                $result = $stmt->get_result();
                $num_rows = $result->num_rows;

                if($num_rows > 0) {
                echo '<script>window.alert("Product is Already in the Cart. Go to the Control Panel to increase quanitity or delete ")</script>';
            }
                
                
                else {

                        $sql = "SELECT * FROM products WHERE product_id = ?";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("i", $p_id);
			$stmt->execute();
			
			$result = $stmt->get_result();
                        $numRows = $result->num_rows;
                        while ($row = $result->fetch_assoc()) {
            
			        $id = $row["product_id"];
                                $pro_name = $row["product_title"];
                                $pro_image = $row["product_image"];
                                $pro_price = $row["product_price"];    
                    
                                $sql = "INSERT INTO `cart` (`p_id`, `pro_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `product_price`, `total_amt`) VALUES    (?,?,?,?,?,?,?,?,?)";
                                
                                $stmt = $con->prepare($sql);
                                $var1 = NULL;
                                $var2 = 0;
                                $qty = 1;
                                $total_amt = $pro_price;
                            
                                $stmt->bind_param("iiiissiii", $var1, $p_id, $var2, $user_id, $pro_name, $pro_image, $qty, $pro_price, $total_amt);
                                
                                if($stmt->execute()){
                                    echo "<div class='alert alert-success'>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <b>Product Added to Cart...!</b>
                                        </div>
                                        ";
                        }}
                    }
            }
      
 else{
    echo '<script>window.alert("Please Log In or Sign Up")</script>';
            
    }           
}

if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){

	$uid = $_SESSION["uid"];

	$sql = "SELECT * FROM cart WHERE user_id = ?";

	$stmt =$con->prepare($sql);
	$stmt->bind_param("i", $uid);
	$stmt->execute();
		$result = $stmt->get_result();
                $num_rows = $result->num_rows;

                if($num_rows > 0) {
                    $no=1;
                    $total_amt =0;
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["p_id"];
                        $pro_id = $row["pro_id"];
                        $pro_name = $row["product_title"];
                        $pro_image = $row["product_image"];
                        $pro_price = $row["product_price"];
			$qty = $row["qty"];
			$total = $row["total_amt"];
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			setcookie("ta",$total_amt,strtotime("+1 day"),"/","","",TRUE);
			
                        
                        if(isset($_POST["get_cart_product"])){
                                
                            echo "

                            <div class='row'>
                                <div class='col-md-3 col-xs-3'>$no</div>
                                    <div class='col-md-3 col-xs-3'><img src='product_images/$pro_image' width='60px' height='50px'></div>
                                    <div class='col-md-3 col-xs-3'>$pro_name</div>
                                    <div class='col-md-3 col-xs-3'>$ $pro_price </div>
                                </div>

			";

			$no = $no + 1;

                        }
                        
                        else{
                        echo "

                                <div class='row'>

                                    <div class='col-md-2 col-sm-2'>

                                        <div class='btn-group'>

                                        <a href='#' remove_id='$pro_id' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-trash'></span></a>

                                        <a href='#' update_id='$pro_id' class='btn btn-primary btn-sm update'><span class='glyphicon glyphicon-ok-sign'></span></a>

                                    </div>

                                </div>

                                    <div class='col-md-2 col-sm-2'><img src='product_images/$pro_image' width='100px' height='100'></div>

                                    <div class='col-md-2 col-sm-2'>$pro_name</div>

                                    <div class='col-md-2 col-sm-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>

                                    <div class='col-md-2 col-sm-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>

                                    <div class='col-md-2 col-sm-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>

                                    </div>

				";
                        }
                        
                    }
                                
		if(isset($_POST["cart_checkout"])){

			echo "<div class='row'>

				<div class='col-md-8'></div>

				<div class='col-md-4'>

					<h2><b>Total $$total_amt </b></h2>

				</div>";	
				}
				
		echo '       <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="business" value="fislam@itcollege.ee">
                                <input type="hidden" name="upload" value="1">';
				  
                                $x=0;
                                $uid = $_SESSION["uid"];
                                $stmt = $con->prepare ("SELECT * FROM cart WHERE user_id = ?");
                                $stmt->bind_param("i", $uid);
				  
                                $stmt->execute();
				  
                                $result = $stmt->get_result();
                                $numRows = $result->num_rows;
                                while ($row = $result->fetch_assoc()) {
                                    $x++;
                               
				 echo  '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
				  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
				  <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
				  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
				  
				  }
				  
				echo   '
				<input type="hidden" name="return" value="https://cash3603.000webhostapp.com/success_payment.php"/>
				<input type="hidden" name="cancel_return" value="https://cash3603.000webhostapp.com//cancel.php"/>
				<input type="hidden" name="currency_code" value="USD"/>
				<input type="hidden" name="custom" value="'.$uid.'"/>
				<input style="float:right;margin-right:80px;" type="image" name="submit"
					src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypal-60px.png" alt="PayPal">
				</form>';
		
		
		
		
		
    }

}

if(isset($_POST["removeFromCart"])){
    $pid = $_POST["removeId"];
    $uid = $_SESSION["uid"];
    $stmt = $con->prepare("DELETE FROM cart WHERE user_id = ? and pro_id = ?");
    $stmt->bind_param("ii", $uid, $pid);
    if ($stmt->execute()){
        echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Product Removed...!</b>
                </div>
                ";
    }
}

if(isset($_POST["updateProduct"])){

	$uid = $_SESSION["uid"];

	$pid = $_POST["updateId"];

	$qty = $_POST["qty"];

	$price = $_POST["price"];

	$total = $_POST["total"];

	

	
$stmt=$con->prepare( "UPDATE cart SET qty = ?,product_price=?,total_amt=? 

	WHERE user_id = ? AND pro_id=?");

	$stmt ->bind_param("iiiii", $qty, $price, $total, $uid, $pid);
        if ($stmt->execute()){
		echo "

			<div class='alert alert-success'>

				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

				<b>Product is Updated Continue Shopping..!</b>

			</div>

		";

	}

}