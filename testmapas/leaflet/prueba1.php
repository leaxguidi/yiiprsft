<html>
<head>
	<title>Test Mapas</title>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.2/mapbox.js'></script>
	<link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.2/mapbox.css' rel='stylesheet' />
	<style type="text/css">
		#map { height: 180px; }
	</style>
</head>
<body>
	<div id="map"></div>
	<script type="text/javascript">
		var map = L.map('map').setView([51.505, -0.09], 13);

		L.tileLayer('', {
		    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		    maxZoom: 18
		}).addTo(map);
	</script>
</body>
</html>