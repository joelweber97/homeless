<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8">
		<title>Display Homeless Inputs</title>
		
		
		  <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  		<link rel="stylesheet" href="custom3.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<style>
      		/* Always set the map height explicitly to define the size of the div
       		* element that contains the map. */
      		#map {
				height: 90%;
				width: 90%;
      			}
      		/* Optional: Makes the sample page fill the window. */
      		html, body {
        		height: 90%;
        		
        		padding: 0;
				}

		</style>
  		<script>
			// Initialize and add the map
			function initMap() {
			  // The location of Uluru
			  var uluru = {lat: -25.344, lng: 131.036};
			  // The map, centered at Uluru
			  var map = new google.maps.Map(
				  document.getElementById('map'), {zoom: 4, center: uluru});
			  // The marker, positioned at Uluru
			  var marker = new google.maps.Marker({position: uluru, map: map});
			}
				</script>

		<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMllrEXr-1ZCrVZhQDwMvui_41aI7vYjU&callback=initMap">
		</script>
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
		
		</div>
		<?php
			
			
			require_once("db.php");

			
			$sql = "select * from markers";
			$result = mysqli_query($con, $sql);
			
			if(!$result){
				die("Invalid query: " . mysqli_error($con));
				
			}
						
		?>

		<div id="map"></div>


		


	</body>
</html>





	