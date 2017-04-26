<?php
session_start();
if(!isset($_SESSION["uid"])){header("location:index.php");}?>

<DOCTYPE HTML!>


<html>
  <head>
  
  <meta charset ="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
  <title>Bossman's Gadget Store 2.0</title>
  <link rel = "stylesheet" href = "css/bootstrap.min.css"/>
  
  <script src = "js/jquery2.js"></script>
  <script src = "js/bootstrap.min.js"></script>
  <script src = "main.js?ts=<?=time()?>&quot;"></script>
  
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cabin:600' rel='stylesheet' type='text/css'>
  
  
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
            
            <li style="width:300px;left:10px;top:10px"><input type ="text" class="form-control" id="search" placeholder="Tap/Click to Search" required></li>
            <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
        
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
                      <!--      <div class="row">
                                
                                <div class="col-md-3">Serial</div>
                                <div class="col-md-3">Image</div>
                                <div class="col-md-3">Name</div>
                                <div class="col-md-3">Price</div>
                            </div>
                       </div>  -->
                       
                       <div>
                        
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </li>    
                
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi !,".$_SESSION["name"]. " |Control Panel|";?></a>
                <ul class="dropdown-menu">
                    <li><a href="cart.php" style="text-decoration:none; color:red;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
                            <li class="divider"></li>
                                <li><a href="contact.php" style="text-decoration:none; color:red;">Contact Me</a></li>
                                    
                                    </ul>
            </li><li><a href="logout.php" style="bgcolor:text-decoration:none; color:red;"><span class="glyphicon glyphicon-log-out">Logout</a></li>
                                        
            </ul>
            
        
      </div>  
    </div>
    
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class=col-md-2>
				<div id="get_category" style="font-family: 'Cabin', sans-serif; font-size:16px;">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand" style="font-family: 'Cabin', sans-serif; font-size:16px;">
				</div>
                    <!--
	            <div class ="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><h4>Brands</h4></a></li>
                    <li><a href="#">Apple</a></li>
                    <li><a href="#">MSI</a></li>
                    <li><a href="#">AMD</a></li>
                    <li><a href="#">Samsung</a></li>
                    <li><a href="#">Corsair</a></li>
                    <li><a href="#">Bethesda</a></li>
                </div>
                -->
            </div>  
                
            
            <div class ="col-md-9">
            <div class = "row">
                <div class="col-md-12" id="product_msg">
                </div>
            </div>
                <div class="panel panel-info">
                    <div class ="panel-heading">Products</div>
                        <div class="panel-body">
                            <div id="get_product" style="font-family: 'Montserrat', sans-serif;">
                            </div>
                            <!--
                            <div class="col-md-4">
                                <div class ="panel panel-info">
                                    <div class ="panel-heading">Samsung Galaxy S8</div>
                                    <div class ="panel-body"></div>
                                        <img src="product_images/S8Plus_S8_Silver_LockUp_rgb.jpg" height="200" width="200" />
                                    <div class ="panel-heading"></div>$899.00
                                        <button style ="float:right;" class="btn btn-danger btn-xs">Add to Cart</button>

                                </div>
                            </div> -->
                    </div>
                    <div class ="panel-footer"><strong>&copy;2017 Farhan The Bossman</strong></div>
                </div> 
            </div>    
            <div class ="col-md-1"></div>
            </div>
            </div>
    
    
</body>


</html>
