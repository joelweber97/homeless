
<?php
	
	
	require_once('phpMailer/PHPMailerAutoload.php');
	
	function sendEmail ($fromEmail, $fromName, $subject, $message){
		$mailer = new PHPMailer();
		$mailer -> isSMTP();
		$mailer -> SMTPAuth = TRUE;
		$mailer -> Host = "ssl://smtp.gmail.com:465";
		$mailer -> Username = "geogumd@gmail.com";
		$mailer->Password="gis@umd2016";
		
		$mailer->From=$fromEmail;
		$mailer->FromName=$fromName . " (" . $fromEmail . " )";
		
		$mailer->Subject = $subject;
		$mailer->Body = $message;
		
		$mailer->addAddress("jweber12@umd.edu", "Joel Weber");
		
		
		if(!$mailer->send()){
			$h = "Mailer Error " . $mailer->ErrorInfo;
			$m = "Mailer Error was not sent";
			print "<h1>$h</h1>";
			print "<pre>$m</pre>";
		}else{
			print "<h1>Mail Sent</h1>";
			print "<p>Thank you. Message has been sent successfully.</p>";
		}
}

	

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mapping Homeless Populations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="custom3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<br />
	<br />
	
	<div class="container">
		<header class="row">
		</header>
		
		<div class="row">
			<nav class="navbar navbar-default">	  	
				<div class="container-fluid">
				  
				    <div class="navbar-header">
				    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
				        	<span class="sr-only">Toggle navigation</span>
				        	<span class="icon-bar"> </span>
				        	<span class="icon-bar"> </span>
				        	<span class="icon-bar"> </span>
				      	</button>
				      	<a class="navbar-brand" href="index.html">Mapping Homeless Populations</a>
				    </div>
	
				  
				    <div class="collapse navbar-collapse" id="navbar">
				    	<ul class="nav navbar-nav navbar-right">
				        	<li><a href="index.html">Home</a></li>
				        	<li><a href="report_homeless.html">Add Location</a></li>
							<li><a href="show_homeless.php">Map</a></li>
				        	<li><a href="help.html">How To Help</a></li>
				        	<li><a href="contact.html">Contact</a></li>
				      	</ul>
				    </div><!-- end navbar-collapse -->
			  </div><!-- end container-fluid -->
			</nav>
		</div>
	
	    <div id="content">
	    	
	    	
	    	<?php
		$fromEmail = $_POST['senderEmail'];
		$fromName = $_POST['senderName'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		
		if(!empty($fromEmail) && !empty($message)){
			sendEmail($fromEmail, $fromName, $subject, $message);
		}else{
			
			print "<h1>Error</h1>";
			print "<p>You must specify your mail address and message.</p>";
			
		}
		?>
	    	</div>
	
		<footer class="text-center">
				<p>J--W--&copy;<br />
				University of Maryland<br />
				Geog657 Web Programming<br />
				<img src="images/umdshell.png" alt="shell" style="width:40px; height:auto;">
				</p>
			</footer>
    </div>
</body>
</html>
