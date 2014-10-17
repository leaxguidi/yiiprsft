
<?php if(Yii::app()->user->hasFlash('success')): ?>
	<br>
	<?php $this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('success'),)); ?>
	<br>

<?php else: ?>

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'password-recovery',
		'type'=>'horizontal',
		'enableClientValidation'=>true,
		'enableAjaxValidation'=>true,
	)); ?>

		<div class="controls">
			<h3>Restablecer Contraseña</h3>
		</div>
		
		<div class="well">
			<?php echo $form->errorSummary($model); ?>
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','placeholder'=>'Ingresa tu correo electrónico')); ?>
		<div class="controls">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'label'=>'Enviar',
				)); ?>
			</div>
		</div>
		

	<?php $this->endWidget(); ?>

<?php endif ?>
