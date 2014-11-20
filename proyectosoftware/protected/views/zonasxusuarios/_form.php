<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'zonasxusuarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'force_from',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'force_to',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zoneid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'monday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tuesday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'wednesday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'thursday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'friday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'saturday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sunday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'worktime',array('class'=>'span5','maxlength'=>0)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
