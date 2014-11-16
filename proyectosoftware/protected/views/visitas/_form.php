<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'visitas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<?php echo $form->textFieldRow($model,'patientid',array('class'=>'span5','maxlength'=>20)); ?>-->

	<!--<?php echo $form->textFieldRow($model,'zoneid',array('class'=>'span5','maxlength'=>20)); ?>-->

	<!--<?php echo $form->textFieldRow($model,'visitdate',array('class'=>'span5')); ?>-->

	<!--<?php echo $form->textFieldRow($model,'employeeid',array('class'=>'span5','maxlength'=>20)); ?>-->

	<?php echo $form->labelEx($model,'Fecha de visita'); ?>
	<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'visitdate', 'model'=>$model, 'attribute'=>'visitdate',
	'value'=>date('Y-m-d'),
	
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'slide', 'dateFormat'=>'yy-mm-dd',
		'showButtonPanel'=>true,
		'currentText'=>'Now',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;',
		'label'=>'fecha',
    ),
)); ?>

	

	<input type="hidden" name="Visitas[lat]" id="Visitas_lat" value="<?php echo $model->lat ?>">
	<input type="hidden" name="Visitas[lon]" id="Visitas_lon" value="<?php echo $model->lon ?>">	
	<div class="control-group">
		<label class="control-label required" for="Visitas_address">
			Dirección
			<span class="required">*</span>
		</label>
		<div class="controls">
			<input class="span5" placeholder="Avenida Rivadavia, Quilmes, Buenos Aires, Argentina." 
			name="Visitas[address]" id="Visitas_address" type="text" onkeypress="return pulsar(event)"
			value="<?php echo (isset($direc)) ? $direc : $model->address;  ?>" >
		</div>		
	</div>
	<!--<?php echo $form->textFieldRow($model,'visited',array('class'=>'span5')); ?>-->

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<!--======================================================================================================-->
<!--======================  CÓDIGO js PARA AUTOCOMPLETAR EL CAMPO DIRECCIÓN  =============================-->
<!--======================================================================================================-->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script>
function initialize() {
	var input = document.getElementById('Visitas_address');
	var autocomplete = new google.maps.places.Autocomplete(input);
	google.maps.event.addListener(autocomplete, 'place_changed', function () {
		var place = autocomplete.getPlace();
		document.getElementById('Visitas_lat').value = place.geometry.location.lat();
		document.getElementById('Visitas_lon').value = place.geometry.location.lng();
		console.log(place.geometry.location.lat());
		console.log(place.geometry.location.lng());
	});
}

$(document).on('ready', function(){
	google.maps.event.addDomListener(window, 'load', initialize);
});

function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=13); 
} 
</script>
<!--======================================================================================================-->
