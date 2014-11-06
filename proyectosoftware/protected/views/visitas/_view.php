<style>
  html, body, #map-canvas {
    height: 300px;
    width:300px
    margin: 0px;
    padding: 0px
  }
  #panel {
    position: absolute;
    top: 5px;
    left: 50%;
    margin-left: -180px;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
  }
</style>
    
<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('visitdate')); ?>:</b>
	<?php echo CHtml::encode($data->visitdate); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('patientid')); ?>:</b>
	<?php echo CHtml::encode($data->patient->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('lon')); ?>:</b>
	<?php echo CHtml::encode($data->lon); ?>
	<br />
	
	<input type="button" name="ver" value="Ver" id="ver" onclick="calcRoute(<?php echo $data->lat ?>, <?php echo $data->lon ?>);"/>
	<input type="button" name="atender" value="Atender" id="atender"/>
	<br /><br />
	<p id="demo"></p>	
</div>

<div id="map-canvas">
  
</div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
	function showPosition(position) {
	    haight = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	    directionsDisplay = new google.maps.DirectionsRenderer();
	    var mapOptions = {
	      zoom: 14,
	      center: haight
	    }
	    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	    directionsDisplay.setMap(map);
	}
  var haight;// = new google.maps.LatLng(-34.5907139, -58.42917969999996);
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var oceanBeach = new google.maps.LatLng(-34.5907139, -58.42917969999996);
  var map;

  function initialize() {
  	if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	        //console.log(position.coords.latitude);
	    } else { 
	        x.innerHTML = "Geolocation is not supported by this browser.";
	    }
  }

  function calcRoute(lat, lon) {
    var selectedMode = 'DRIVING';
    var request = {
        origin: haight,
        //origin: haight,
        destination: new google.maps.LatLng(lat, lon),
        // Note that Javascript allows us to access the constant
        // using square brackets and a string value as its
        // "property."
        travelMode: google.maps.TravelMode[selectedMode]
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>