<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

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
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
