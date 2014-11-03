<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'street',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'street_number',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sexo',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'account_verification_code',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_alta',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_ultimo_login',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_type',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'latitud',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'longitud',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
