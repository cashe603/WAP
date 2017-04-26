<?php
session_start();
if(isset($_SESSION["uid"])){header("location:profile.php");
}

	if (isset($_POST["submit"])) {
		$email = $_POST['email'];
		$human = intval($_POST['human']);
		$from = 'customer@bossman.ml'; 
		$to = 'farhan.islam@itcollege.ee'; 
		$subject = 'Password Reset';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n Hi Can I please have a new password?";
				if (!$_POST['name']) {
			$errName = 'Enter a Valid Name';
		}
		
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Enter a valid email address';
		}
		
		if ($human !== 69) {
			$errHuman = 'Are you a Bot?';
		}

if (!$errEmail && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">If you have a valid account, the admin shall email you a new password shortly. Rest In Peace. </div>';
	} else {
		$result='<div class="alert alert-danger">Error. Please try again.</div>';
	}
}
	}
?>


<DOCTYPE HTML!>

<html>
  <head>
  
  <meta charset ="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
  <title>Reset Password</title>
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
	<h1 style ="text-align:center;">Password Reset Form</h1>
	<p><br/></p>
	<p><br/></p>
	<form class="form-horizontal" role="form" method="post" action="reset_pwd.php" style= "color:gray;">
	
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" value="<?php echo htmlspecialchars($_POST['email']); ?>">
			<?php echo "<p class='text-danger'>$errEmail</p>";?>
		</div>
	</div>
	
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">60 + 9 = ?</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" required>
			<?php echo "<p class='text-danger'>$errHuman</p>";?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-2">
			<?php echo $result; header( "refresh:10;url=index.php" );?>	
		</div>
	</div>
</form> 
	<div> 	
</div>
</div>
</div>

<p><br/></p>
<p><br/></p>

</div>
<div class ="panel-footer"><strong>&copy;2017 Farhan The Bossman</strong></div>
</div> 
</div>    
<div class ="col-md-1"></div>
</div>
</div>                    		

</body>
