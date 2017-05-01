<?php
session_start();
if(!isset($_SESSION["uid"])){header("location:index.php");}

$trx_id = $_GET["tx"];
$payment_status = $_GET["st"];
$amt = $_GET["amt"];
$cc = $_GET["cc"];
$cm = $_GET["cm"];
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
  <link href="Oswald-Regular.ttf" rel="stylesheet" type="text/css">
  <link href="Cabin-MediumItalic-TTF.ttf" rel="stylesheet" type="text/css">
  
  <style>
			p {padding:10px; font-family:cabin; font-size:17px;}
			h1 {font-family:Montserrat;text-align:center;}
			 
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
						<h1>Thank You for Shopping at Bossman's!</h1>
						<hr/>
						<p> <?php echo $_SESSION["name"]; ?>, your payment was successful. Your transaction id is <strong> <?php echo $trx_id; ?>
						</strong><br/>
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

<?php session_destroy();
    session_write_close(); ?>
