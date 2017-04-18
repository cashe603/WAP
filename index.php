<DOCTYPE HTML!>

<html>
  <head>
  
  <meta charset ="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
  <title>Bossman's Gadget Store 2.0</title>
  <link rel = "stylesheet" href = "css/bootstrap.css"/>
  
  <script src = "js/jquery2.js"></script>
  <script src = "js/bootstrap.min.js"></script>
  <script src = "main.js?ts=<?=time()?>&quot;"></script>
    
    
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
      <a class="navbar-brand" href="#">Bossman's Gadgets</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="prodcts.php"><span class="glyphicon glyphicon-modal-window"></span>Products</a></li>
            <li style="width:300px;left:10px;top:10px"><input type ="text" class="form-control" id="search" placeholder="Search" required></li>
            <li style="top:10px;left:20px;"><input type ="submit" class="btn btn-primary" id="search_btn" required></li>
        
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
                                <label for="email">E-mail Address</label>
                                <input type ="email" class ="form-control" id="email" required/>
                                <label for="email">Password</label>
                                <input type ="password" class ="form-control" id="password" required/>
                                <p><br/></p>
                                <a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
                            </div>
                            <div class="panel-footer" id="e_msg"></div>
                        </div>    
                    </div>   
                </ul>
            </li>    
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
            <li><a href="#"><span class= "glyphicon glyphicon-phone-alt"></span>Contact Me</a></li>
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
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
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
                
            
            <div class ="col-md-7">
                <div class="panel panel-info">
                    <div class ="panel-heading">Products</div>
                        <div class="panel-body">
                            <div id="get_product">
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
