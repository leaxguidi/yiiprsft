<?php
/* @var $this ZonasxusuariosController */
/* @var $model Zonasxusuarios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'force_from'); ?>
		<?php echo $form->textField($model,'force_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'force_to'); ?>
		<?php echo $form->textField($model,'force_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zoneid'); ?>
		<?php echo $form->textField($model,'zoneid',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userid'); ?>
		<?php echo $form->textField($model,'userid',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monday'); ?>
		<?php echo $form->textField($model,'monday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tuesday'); ?>
		<?php echo $form->textField($model,'tuesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wednesday'); ?>
		<?php echo $form->textField($model,'wednesday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thursday'); ?>
		<?php echo $form->textField($model,'thursday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'friday'); ?>
		<?php echo $form->textField($model,'friday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saturday'); ?>
		<?php echo $form->textField($model,'saturday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sunday'); ?>
		<?php echo $form->textField($model,'sunday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'worktime'); ?>
		<?php echo $form->textField($model,'worktime',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->