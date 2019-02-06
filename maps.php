<!DOCTYPE html>
<html>
  <head>
	<link rel="stylesheet" href="custom3.css">
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
				height: 90%;
				width: 90%
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        margin: 20px;
        padding: 0;
			}

		</style>

  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
	<div id="map"></div>
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
  </body>
</html>