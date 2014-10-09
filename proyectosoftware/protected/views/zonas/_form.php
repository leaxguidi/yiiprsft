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
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>
    
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'employees',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lati',array('class'=>'span5','maxlength'=>255,'readonly'=>'false')); ?>

	<?php echo $form->textFieldRow($model,'lngi',array('class'=>'span5','maxlength'=>255,'readonly'=>'false')); ?>

	<?php echo $form->textFieldRow($model,'latf',array('class'=>'span5','maxlength'=>255,'readonly'=>'false')); ?>

	<?php echo $form->textFieldRow($model,'lngf',array('class'=>'span5','maxlength'=>255,'readonly'=>'false')); ?>
	
	<div id="map-canvas"></div>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	
    <script>
		var rectangle;
		var map;
		var infoWindow;
		
		var lati = document.getElementById('Zonas_lati').value;
		var lngi = document.getElementById('Zonas_lngi').value;
		var latf = document.getElementById('Zonas_latf').value;
		var lngf = document.getElementById('Zonas_lngf').value; 
		
		lati = (lati != "") ? parseFloat(lati) : -34.822417675522324;
	  	lngi = (lngi != "") ? parseFloat(lngi) : -58.311933349609376;
	  	latf = (latf != "") ? parseFloat(latf) : -34.76674479036495;
	  	lngf = (lngf != "") ? parseFloat(lngf) : -58.24051586914061;
		
		function initialize() {		  
		  //console.log('Input',lati,lngi,latf,lngf);
		  
		  var latProm = parseFloat((latf + lati)/2);
		  var lngProm = parseFloat((lngf + lngi)/2);
		  //Promedios
		  latProm = (latProm != 0) ? latProm : -34.76674479036495;
		  lngProm = (lngProm != 0) ? lngProm : -58.311933349609376;
		  //console.log(latProm,lngProm)
		  //Valores en update
		  lati = (lati != 0) ? lati : -34.822417675522324;
		  lngi = (lngi != 0) ? lngi : -58.311933349609376;
		  latf = (latf != 0) ? latf : -34.76674479036495;
		  lngf = (lngf != 0) ? lngf : -58.24051586914061;
		  console.log(lati,lngi,latf,lngf)
		  //console.log('Condicion',(lati=0),(lngi=0),(latf=0),(lngf=0));
		  //console.log('Pasofuncion',lati,lngi,latf,lngf);
		  var mapOptions = {
		    center: new google.maps.LatLng(latProm, lngProm),
		    zoom: 11
		  };
		  map = new google.maps.Map(document.getElementById('map-canvas'),
		      mapOptions);
		
		  var bounds = new google.maps.LatLngBounds(
		      new google.maps.LatLng(lati, lngi),
		      new google.maps.LatLng(latf, lngf)
		  );
		
		  rectangle = new google.maps.Rectangle({
		    bounds: bounds,
		    editable: true,
		    draggable: true
		  });
		
		  rectangle.setMap(map);			
		  google.maps.event.addListener(rectangle, 'bounds_changed', showNewRect);			
		}
		
		function showNewRect(event) {
		  var ne = rectangle.getBounds().getNorthEast();
		  var sw = rectangle.getBounds().getSouthWest();
		
		  document.getElementById('Zonas_latf').value = ne.lat();
		  document.getElementById('Zonas_lngf').value = ne.lng();
		  document.getElementById('Zonas_lati').value = sw.lat();
		  document.getElementById('Zonas_lngi').value = sw.lng();
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
<?php $this->endWidget(); ?>
