<DOCTYPE HTML!>

<html>
  <head>
  <meta charset ="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no"/>
  <title>Bossman's Gadget Store 2.0</title>
  <link rel = "stylesheet" href = "css/bootstrap.css"/>
  
  <script src = "js/jquery.js"></script>
  <script src = "js/bootstrap.min.js"></script>
  <script src = "main.js?ts=<?=time()?>&quot;"></script>
    
    
  </head>
    
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href ="#" class="navbar-brand">Bossman's Gadget Shop</a>
        </div>
        <ul class ="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="prodcts.php"><span class="glyphicon glyphicon-modal-window"></span>Products</a></li>
            <li style="width:300px;left:10px;top:10px"><input type ="text" class="form-control" id="search" placeholder="Search" required></li>
            <li style="top:10px;left:20px;"><input type ="submit" class="btn btn-primary" id="search_btn" required></li>
        
        </ul>
        
        <ul class ="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Log In</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
            <li><a href="#"><span class= "glyphicon glyphicon-phone-alt"></span>Contact Me</a></li>
        </ul>
        
      </div>  
    </div>
    
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class ="container-fluid">
        <div class ="row">
            <div class ="col-md-1"></div>
            <div class ="col-md-2">
                <div class ="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><h3>Categories</h3></a></li>
                    <li><a href="#">Phones</a></li>
                    <li><a href="#">Notebooks</a></li>
                    <li><a href="#">Tablets</a></li>
                    <li><a href="#">PC Hardware</a></li>
                    <li><a href="#">Videogames</a></li>
                </div>
            </div>  
                
            
            <div class ="col-md-8"></div>
            <div class ="col-md-1"></div>
        </div>
    </div>
    
    
</body>


</html>
