<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>

	<?php echo $form->textFieldRow($model,'zoneid',array('class'=>'span5','maxlength'=>20)); ?>

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
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
