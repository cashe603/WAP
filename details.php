<?php
session_start();

require_once("config.php");


?>
<!DOCTYPE HTML>
<html>

<head>
  
  <meta charset ="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <title>Bossman's Gadget Store 2.0</title>
  <link rel = "stylesheet" href = "css/bootstrap.min.css">
  
  <script src = "js/jquery2.js"></script>
  <script src = "js/bootstrap.min.js"></script>
  <script src = "main.js"></script>
  
  <link href="Montserrat-Bold.ttf" rel="stylesheet" type="text/css">
  <link href="Oswald-Bold.ttf" rel="stylesheet" type="text/css">
  <link href="Cabin-MediumItalic-TTF.ttf" rel="stylesheet" type="text/css">
  
  <style>

			@media screen and (max-width:720px){

				#search{width:80%;}

				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}

			}

    </style>
    
    
</head>
    
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Bossman's Gadgets</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
             </ul>
        
        <ul class ="nav navbar-nav navbar-right">
            <li><a href="cart.php" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                <div class="dropdown-menu" style="width:300px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3">Serial</div>
                                <div class="col-md-3">Image</div>
                                <div class="col-md-3">Name</div>
                                <div class="col-md-3">Price</div>
                            </div>
                        </div>    
                        <div class="panel-body">
                      <div id = "cart_product">
                       
                       <div>
                        
                        
                </div>
            </li>    
                
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
            <?php if(isset($_SESSION["uid"])){ 
            echo "Hi !,".$_SESSION["name"]. " |Control Panel|"; 
            echo '</a>
                <ul class="dropdown-menu">
                    <li><a href="cart.php" style="text-decoration:none; color:red;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
                            <li class="divider"></li>
                                <li><a href="contact.php" style="text-decoration:none; color:red;">Contact Me</a></li>
                                    
                                    </ul>
            </li><li><a href="logout.php" style="bgcolor:text-decoration:none; color:red;"><span class="glyphicon glyphicon-log-out">Logout</a></li>
                                        
            </ul>';
            
            
            }
            else{
            echo"Hi Guest!";
            echo '
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span>Log In</a>
                <ul class="dropdown-menu">
                    <div style="width:300px;">
                        <div class ="panel panel-primary">
                            <div class="panel-heading">Sign In</div>
                            <div class="panel-heading">
                                <label>Username</label>
                                <input type ="email" class ="form-control" id="username" placeholder="Enter your username"/>
                                <label>Password</label>
                                <input type ="password" class ="form-control" id="password" placeholder="Enter your password"/>
                                <p><br/></p>
                                <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button> 
                                <a href="reset_pwd.php" style="color:white; list-style:none;">Forgotten Password</a>
                            </div>
                              
                </ul>
            </li>    
            <li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
            </ul>
        
      </div>  
    </div>';
            }
            
            
            ?>
        
      </div>  
    </div>
    
    
    <p><br/></p>
   
    <div class="container-fluid">
		<div class="row">
			<div class=col-md-2>
				<div>
				</div>
				
            </div>

			<div class="col-md-8">

				<div class="row">

					<div class="col-md-6" id="product_msg">

					</div>

				</div>

				<div class="panel panel-info" style="font-family: 'Cabin', sans-serif; font-size:16px;">
                                        
					<div class="panel-heading"><h4>Products Details</h4></div>
					 <a href='index.php' style='margin:5px' class='btn btn-danger btn-sm' role='button' ><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Go Back</a>
                                       

					<div class="panel-body" style="font-family: 'Cabin', sans-serif; font-size:16px;">

<?php 
	if(isset($_GET['pro_id'])){
	
	$product_id = $con->real_escape_string($_GET['pro_id']);
	
	$query = "SELECT product_id, product_title,product_price,product_desc,product_image FROM products WHERE product_id=?";
	$stmt = $con->prepare($query);
	$stmt->bind_param("i",$product_id);
	$stmt->execute();
        
	$result = $stmt->get_result();
        $num_rows = $result->num_rows;

            if($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                        
                $pro_id = $row['product_id'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		$pro_desc = $row['product_desc'];
	
		echo"
                            <div class='col-md-6'>
                                <div class ='panel panel-info'>
                                    <div class ='panel-heading' style='text-align:center;'><h3>$pro_title</h3></div>
                                    <div class ='panel-body'></div>
                                        <img src='product_images/$pro_image' height='380' width='380' />
                                        </div>
                                        <div class = 'well well-sm'>$pro_desc</p>
                                        </div>
                                    <div class ='panel-heading'></div><h4> $ $pro_price </h4>
                                        <button p_id = '$pro_id' style ='float:auto;' id='product' class='btn btn-danger btn-xs'>Add to Cart</button>
                                    </div>
                                </div>
                            </div>";    
                            
            }
	}
    }
?>
                            </div>
                           </div>
                    <div class ="panel-footer"><strong>&copy;2017 Farhan The Bossman</strong></div>
                </div> 
            </div>    
            <div class ="col-md-1"></div>
            </div>
            </div>
    
    
</body>


</html>
