
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuarios-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span2','placeholder'=>'12345678')); ?>
	<?php echo $form->textFieldRow($model,'username',array('class'=>'span3','placeholder'=>'Nombre Apellido')); ?>

	<div class="control-group">
		<label class="control-label required" for="Usuarios_street">
			Dirección
			<span class="required">*</span>
		</label>
		<div class="controls">
			<input class="span5" placeholder="Avenida Rivadavia, Quilmes, Buenos Aires, Argentina." 
			name="Usuarios[street]" id="Usuarios_street" type="text" 
			value="<?php echo (isset($direc)) ? $direc : '' ;  ?>" >
		</div>		
	</div>
	
	<input type="hidden" name="latitud_str" id="Usuarios_latitud">
	<input type="hidden" name="longitud_str" id="Usuarios_longitud">	
	
	<!--	número de calle (código html)	-->
	<!--
		<div class="control-group ">
			<label class="control-label required" for="Usuarios_street_number">
				Número 
			<span class="required">*</span>
			</label>
			<div class="controls">
				<input class="span1" placeholder="1234" name="Usuarios[street_number]" id="Usuarios_street_number" type="text" maxlength="6" />
				<span class="help-inline error" id="Usuarios_street_number_em_" style="display: none"></span>
			</div>
		</div>
	-->

	<?php echo $form->textFieldRow($model,'street_number',array('class'=>'span3','placeholder'=>'Número de casa')); ?>
	<?php echo $form->dropDownListRow($model, 'sexo', $model->get_opctions_sexo()); ?>
	<?php echo $form->textFieldRow($model,'email',array(
				'class'=>'span4',
				'placeholder'=>'Correo electrónico',
				'hint'=>'<font size="2" color="#3DB53D">Te enviaremos un correo para confirmar tu registro.</font>')); ?>
				
	<?php echo $form->textFieldRow($model,'repeat_email',array('class'=>'span4','placeholder'=>'Repite el correo electrónico')); ?>
	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3','placeholder'=>'Crea una contraseña')); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->captchaRow($model,'captcha_code', array('class'=>'span2','placeholder'=>'Ingresa el resultado')); ?>
	<?php endif; ?>		
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Registrarme' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<!--======================================================================================================-->
<!--======================  CÓDIGO js PARA AUTOCOMPLETAR EL CAMPO DIRECCIÓN  =============================-->
<!--======================================================================================================-->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script src="js/jquery-1.8.2.min.js"></script>
    <script>
	function initialize() {
    	var input = document.getElementById('Usuarios_street');
    	var autocomplete = new google.maps.places.Autocomplete(input);
    	google.maps.event.addListener(autocomplete, 'place_changed', function () {
			var place = autocomplete.getPlace();
			document.getElementById('Usuarios_latitud').value = place.geometry.location.lat();
			document.getElementById('Usuarios_longitud').value = place.geometry.location.lng();
			//~ alert(place.geometry.location.lat());
			//~ alert(place.geometry.location.lng());
		});
  	}
    
    $(document).on('ready', function(){
		google.maps.event.addDomListener(window, 'load', initialize);
    });
</script>
<!--======================================================================================================-->
