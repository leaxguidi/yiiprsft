	<style>
    	#map-canvas {
	        height: 300px;
	        width: 500px;
	        margin: 0px;
	        padding: 0px
	    }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'zonas-form',
	'enableAjaxValidation'=>true,
)); ?>
    
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'employees',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lati',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'lngi',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'latf',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'lngf',array('class'=>'span5','maxlength'=>255)); ?>
	
	
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	<div id="map-canvas"></div>
    <script>
		// This example adds a user-editable rectangle to the map.
		// When the user changes the bounds of the rectangle,
		// an info window pops up displaying the new bounds.
		
		var rectangle;
		var map;
		var infoWindow;
		
		function initialize() {
		  var mapOptions = {
		    center: new google.maps.LatLng(-34.76674479036495, -58.311933349609376),
		    zoom: 11
		  };
		  map = new google.maps.Map(document.getElementById('map-canvas'),
		      mapOptions);
		
		  var bounds = new google.maps.LatLngBounds(
		      new google.maps.LatLng(-34.822417675522324, -58.311933349609376),
		      new google.maps.LatLng(-34.76674479036495, -58.24051586914061)
		  );
		
		  // Define the rectangle and set its editable property to true.
		  rectangle = new google.maps.Rectangle({
		    bounds: bounds,
		    editable: true,
		    draggable: true
		  });
		
		  rectangle.setMap(map);			
		  // Add an event listener on the rectangle.
		  google.maps.event.addListener(rectangle, 'bounds_changed', showNewRect);			
		  // Define an info window on the map.
		  //infoWindow = new google.maps.InfoWindow();
		}
		// Show the new coordinates for the rectangle in an info window.
		
		/** @this {google.maps.Rectangle} */
		function showNewRect(event) {
		  var ne = rectangle.getBounds().getNorthEast();
		  var sw = rectangle.getBounds().getSouthWest();
		
		  var contentString = '<b>Rectangle moved.</b><br>' +
		      'New north-east corner: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
		      'New south-west corner: ' + sw.lat() + ', ' + sw.lng();
		
		  // Set the info window's content and position.
		  infoWindow.setContent(contentString);
		  infoWindow.setPosition(ne);
		
		  infoWindow.open(map);
		  document.getElementById('Zonas_lati').value = ne.lat();
		  document.getElementById('Zonas_lngi').value = ne.lng();
		  document.getElementById('Zonas_latf').value = sw.lat();
		  document.getElementById('Zonas_lngf').value = sw.lng();
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
<?php $this->endWidget(); ?>
