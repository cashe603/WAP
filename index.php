<?php
session_start();
if(isset($_SESSION["uid"])){header("location:profile.php");}?>
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
  
  <link href='http://fonts.googleapis.com/css?family=Montserrat:500' rel='stylesheet' type='text/css'>
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
            
            <li style="width:300px;left:10px;top:10px"><input type ="text" class="form-control" id="search" placeholder="Tap/Click to Search"></li>
            <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
        
        </ul>
        
        <ul class ="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                <div class="dropdown-menu" style="width:300px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3">Id</div>
                                <div class="col-md-3">Image</div>
                                <div class="col-md-3">Name</div>
                                <div class="col-md-3">Price</div>
                            </div>
                        </div>    
                        <div class="panel-body"></div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </li>    
                
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
                            <div class="panel-footer" id="e_msg"></div>
                        </div>    
                    </div>   
                </ul>
            </li>    
            <li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
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
				
				<div id="get_brand" style="font-family: 'Cabin', sans-serif; font-size:16px;">
				</div>
                   
            </div>

			<div class="col-md-8">

				<div class="row">

					<div class="col-md-12" id="product_msg">

					</div>

				</div>

				<div class="panel panel-info">

					<div class="panel-heading">Products</div>

					<div class="panel-body">

			                <div id="get_product" style="font-family: 'Montserrat', sans-serif;">
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
