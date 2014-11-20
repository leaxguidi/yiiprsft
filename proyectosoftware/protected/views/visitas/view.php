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

<?php
$this->breadcrumbs=array(
	'Visitar'=>array('visitar'),
	$model->visitid,
); ?>

<h1>View Visitas #<?php echo $model->visitid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'patientid',
		array(
			'name'=>'patientid',
			'value'=>'$data->patient->username',
		),
		'zoneid',
		array(
			'name'=>'zoneid',
			'value'=>'$data->zone->name',
		),
		'visitdate',
		'address',
		'lat',
		'lon',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Ver',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('onClick'=>'calcRoute('.$model->lat.','.$model->lon.')'),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Atender',
    'type'=>'success',
    'url'=>array('/visitas/atender','id'=>$model->visitid), // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
)); ?>

<p id="demo"></p>	
<div id="map-canvas">
	
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