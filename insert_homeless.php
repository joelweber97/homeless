<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert</title>
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
	
		<div id="content" class="row">


			<h1>Your Information Has Been Recorded</h1>
			
			<div id="insertDiv">
			
			<?php		
			
			
				require_once("db.php");
				

			
				$error = null;
				$message = null;
				
				$age = $_POST['rbAge'];
				$gender = $_POST['rbGender'];
				$activity = $_POST['activity'];
				$date = $_POST['rpDate'];
				$location = $_POST['location'];
				$latitude = $_POST['lat'];
				$longitude = $_POST['lng'];
				
			
								
	          
				if (!empty($location) && is_string($location) 
				&& is_numeric($latitude) && !empty($latitude)
				&& is_numeric($longitude) && !empty($longitude)
				&& is_string($date) && !empty($date)){ 
					
					
			?>			
				
				
				<dl>
					<dt class="table">Age:</dt>	
					<dd class="table2"> <?php print $age; ?></dd>
		<br />
					<dt class="table">Gender:</dt>
					<dd class="table2"> <?php print $gender; ?></dd>
					<br />
					<dt class="table">Activity:</dt>
					<dd class="table2"> <?php print $activity; ?> </dd>
					<br />
					<dt class="table">Date:</dt>
					<dd class="table2"> <?php print $date; ?> </dd>
					<br />
					<dt class="table">Location:</dt>
					<dd class="table2"><?php print $location ?></dd>
					<br />
					<dt class="table">Latitude:</dt>
					<dd class="table2"><?php print $latitude ?> </dd>
					<br />
					<dt class="table">Longitude:</dt>
					<dd class="table2"><?php print $longitude ?></dd>
					

				</dl> 
				
			<?php	
			
			
				$sql = "insert markers(age, gender, activity, date, location, latitude, longitude) 
				values ('$age', '$gender', '$activity', '$date', '$location', '$latitude', '$longitude')";
				
							
				$result = mysqli_query($con, $sql);
				if($result){
					echo "<h4> Succeeded to insert a record. </h4>";
				}else{
					echo "<h4> Failed to insert a record</h4>";
					}
				
			
				}  
				else {
		
					print "<h4>Error</h4>";
					print "<p>You didn't fill out the form completely.  <a href='report_homeless.html'>Try again?</a></p>";
				}
			?>	

				</div>	
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