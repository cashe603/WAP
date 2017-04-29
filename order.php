<?php
session_start();
if(!isset($_SESSION["uid"])){header("location:index.php");}?>

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
  
  
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cabin:600' rel='stylesheet' type='text/css'>
  
 <style>
			table tr td {padding:10px; font-family:Montserrat;}
			h1 {text-align:center;font-family:Cabin;}
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
            </li><li><a href="logout.php" style="bgcolor:text-decoration:none; color:red;"><span class="glyphicon glyphicon-log-out">Logout</a><li>
            </ul>
</div>
</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customer Order details</h1>
						<hr/>
						<div class="row">
							<div class="col-md-6">
								<img style="float:right;" src="product_images/doom.jpg" class="img-thumbnail"/>
							</div>
							<div class="col-md-6">
								<table>
								<div>
									<tr><td>Product Name</td><td><b>Product</b> </td></tr>
									<tr><td>Product Price</td><td><b>$</b></td></tr>
									<tr><td>Quantity</td><td><b>1</b></td></tr>
									<tr><td>Payment</td><td><b>Completed</b></td></tr>
									<tr><td>Transaction Id</td><td><b>RTSH5415SHSHYD87D25S</b></td></tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>    
    
    </div>
        <div class ="panel-footer" style = "text-align:center;"><strong>&copy;2017 Farhan The Bossman</strong></div>
    </div> 
    </div>    
    <div class ="col-md-1"></div>
    </div>
    </div>
    
    
</body>


</html>
