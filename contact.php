<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'customer@bossman.ml'; 
		$to = 'farhan.islam@itcollege.ee'; 
		$subject = 'Message from a Customer ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
				if (!$_POST['name']) {
			$errName = 'Enter a Valid Name';
		}
		
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Enter a valid email address';
		}
		if (!$_POST['message']) {
			$errMessage = 'Enter your message';
		}
		if ($human !== 99) {
			$errHuman = 'Are you a Bot?';
		}

if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">I shall get back to you in due time. Meanwhile do not get your hopes too high.</div>';
	} else {
		$result='<div class="alert alert-danger">There was an error sending your message. You must try again later.</div>';
	}
}
	}
?>


<DOCTYPE HTML!>

<html>
  <head>
  
  <meta charset ="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
  <title>Contact The Man</title>
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
	<form class="form-horizontal" role="form" method="post" action="contact.php" style= "color:red;">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
			<?php echo "<p class='text-danger'>$errName</p>";?>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-8">
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" value="<?php echo htmlspecialchars($_POST['email']); ?>">
			<?php echo "<p class='text-danger'>$errEmail</p>";?>
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-8">
			<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
			<?php echo "<p class='text-danger'>$errMessage</p>";?>
		</div>
	</div>
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">100 - 1 = ?</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
			<?php echo "<p class='text-danger'>$errHuman</p>";?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<?php echo $result; ?>	
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
