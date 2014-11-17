<?php
/* @var $this PerfilController */
/* @var $model Usuarios */

$this->menu=array(
	array('label'=>'Cancelar', 'url'=>array('authenticate')),
);
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'perfil-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>


<div class='thumbnail'>
	<div class='well'>
		<center><h3>Mi Perfil (actualizar)</h3></center>
		
	</div>

	<div class="well">
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'dni', array('value'=>$model->dni, 'readonly'=>'false')); ?>
		<?php echo $form->passwordFieldRow($model,'password', array('onkeypress'=>'return pulsar(event)', 'value'=>$model->password)); ?>


	</div>	

	<div class="well">
		<?php echo $form->textFieldRow($model,'username', array('onkeypress'=>'return pulsar(event)', 'class'=>'span4')); ?>
		<?php echo $form->textFieldRow($model,'email', array('onkeypress'=>'return pulsar(event)', 'value'=>$model->email, 'class'=>'span5')); ?>

		<input type="hidden" name="Perfil[latitud]" id="Perfil_latitud" value="<?php echo $model->latitud ?>">
		<input type="hidden" name="Perfil[longitud]" id="Perfil_longitud" value="<?php echo $model->longitud ?>">	

		<div class="control-group">
			<label class="control-label required" for="Perfil_street">
				Dirección
				<span class="required">*</span>
			</label>
			<div class="controls">
				<input class="span5" placeholder="Avenida Rivadavia, Quilmes, Buenos Aires, Argentina." 
				name="Perfil[street]" id="Perfil_street" type="text" onkeypress="return pulsar(event)"
				value="<?php echo (isset($direc)) ? $direc : $model->street ;  ?>" >
			</div>		
		</div>


		<?php echo $form->textFieldRow($model,'street_number', array('onkeypress'=>'return pulsar(event)', 'value'=>$model->street_number, 'class'=>'span2')); ?>

		<?php echo $form->dropDownListRow($model, 'sexo', array('Hombre' => 'Hombre', 'Mujer' => 'Mujer', 'Otro' => 'Otro')); ?>

		<?php echo $form->textFieldRow($model,'fecha_alta', array('value'=>$model->fecha_alta, 'class'=>'span2', 'readonly'=>'false')); ?>
		
		
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'success',
				'label'=>'Guardar Cambios',
			)); ?>
		</div>		
		
		
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!--======================================================================================================-->
<!--======================  CÓDIGO js PARA AUTOCOMPLETAR EL CAMPO DIRECCIÓN  =============================-->
<!--======================================================================================================-->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script>
function initialize() {
	var input = document.getElementById('Perfil_street');
	var autocomplete = new google.maps.places.Autocomplete(input);
	google.maps.event.addListener(autocomplete, 'place_changed', function () {
		var place = autocomplete.getPlace();
		document.getElementById('Perfil_latitud').value = place.geometry.location.lat();
		document.getElementById('Perfil_longitud').value = place.geometry.location.lng();
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

