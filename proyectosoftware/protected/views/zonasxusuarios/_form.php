<?php
/* @var $this ZonasxusuariosController */
/* @var $model Zonasxusuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zonasxusuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'force_from'); ?>
		<?php echo $form->textField($model,'force_from'); ?>
		<?php echo $form->error($model,'force_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'force_to'); ?>
		<?php echo $form->textField($model,'force_to'); ?>
		<?php echo $form->error($model,'force_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zoneid'); ?>
		<?php echo $form->textField($model,'zoneid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'zoneid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monday'); ?>
		<?php echo $form->textField($model,'monday'); ?>
		<?php echo $form->error($model,'monday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tuesday'); ?>
		<?php echo $form->textField($model,'tuesday'); ?>
		<?php echo $form->error($model,'tuesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wednesday'); ?>
		<?php echo $form->textField($model,'wednesday'); ?>
		<?php echo $form->error($model,'wednesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thursday'); ?>
		<?php echo $form->textField($model,'thursday'); ?>
		<?php echo $form->error($model,'thursday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friday'); ?>
		<?php echo $form->textField($model,'friday'); ?>
		<?php echo $form->error($model,'friday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saturday'); ?>
		<?php echo $form->textField($model,'saturday'); ?>
		<?php echo $form->error($model,'saturday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sunday'); ?>
		<?php echo $form->textField($model,'sunday'); ?>
		<?php echo $form->error($model,'sunday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'worktime'); ?>
		<?php echo $form->textField($model,'worktime',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'worktime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
