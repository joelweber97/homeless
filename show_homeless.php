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
				width: 85%;
      			}
      		/* Optional: Makes the sample page fill the window. */
      		html, body{
        		height: 90%;
        		
        		padding: 0;
				}

		</style>



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


		<div id="map"></div>

		<script>
      var customLabel = {
        Male: {
          label: 'M'
        },
        Female: {
          label: 'F'
        },
				Unknown: {
					label: 'U'
				},
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(38, -79),
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('./phpsqlajax_genxml2.php', function(data) {
            var xml = data.responseXML;
						console.log(xml)
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var age = markerElem.getAttribute('age');
							console.log(age)
              var gender = markerElem.getAttribute('gender');
              var activity = markerElem.getAttribute('activity');
							var date = markerElem.getAttribute('date');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitude')),
                  parseFloat(markerElem.getAttribute('longitude')));
							var location = markerElem.getAttribute('location');
							
							
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = gender
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = location;
              infowincontent.appendChild(text);
              var icon = customLabel[gender] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

				

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest();

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
		
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMllrEXr-1ZCrVZhQDwMvui_41aI7vYjU&callback=initMap">
	</script>

	
	</body>
</html>





	