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
    </div>   
    </div>
    
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container-fluid">
    
     <div class="row">
        <div class ="col-md-2"></div>
        <div class = "col-md-8" id="signup_msg">
        </div>
    </div>
    
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class ="panel panel-primary">
                    <div class = "panel panel-heading">Registration Form</div>
                        <div class = "panel panel-body">
                       
                        
                            <form method = "post">
                            <div class= "row">
                                <div class ="col-md-8">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>        
                            </div>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>        
                            </div>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <label for="email">Email Adress</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>        
                            </div>
                            
                            <div class= "row">
                                <div class ="col-md-8">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>        
                            </div>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <label for="country">Country</label>
                                    <select  class="form-control" name="country">
           					<option value = "0">Select Your Current Country</option>
           					<option value = "Estonia">Estonia</option>
           					<option value = "Finland">Finland</option>
           					<option value= "Lithuania">Lithuania</option>
           					<option value = "Latvia">Latvia</option>
           					<option value = "Poland">Poland</option>
           					<option value = "Norway">Norway</option> required/></td>
           				</select>
                                </div>        
                            </div>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" class="form-control">
                                </div>        
                            </div>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <label for="email">Address</label>
                                    <input type="text" id="address" name="address" class="form-control">
                                </div>        
                            </div>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <label for="email">Zip/Postal Code</label>
                                    <input type="text" id="zip" name="zip" class="form-control">
                                </div>        
                            </div>
                            
                            <p><br/></p>
                            
                            <div class = "row">
                                <div class ="col-md-8">
                                    <input style="float:auto;" value="Sign Up" type="button" id="signup_button" name="signup_button" class="btn btn-success btn-lg">
                                </div>        
                            </div>
                            
                            
                            </form>
                            
                            </div>
                            </div>
                        <div class = "panel panel-footer">&copy;2017 Farhan The Bossman</div>
                    
                
    
</body>
</html>

