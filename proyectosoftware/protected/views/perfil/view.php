<?php
/* @var $this PerfilController */
/* @var $model Perfil */

$this->menu=array(
	array('label'=>'Actualizar Perfil', 'url'=>array('update')),
);
?>

	
	<div class='thumbnail'>
		<div class='well'>
			<center><h3>Mi Perfil</font></h3>
		</div>
	<!--  Formulario -->

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'type'=>'horizontal',
	));
	?>
		
		<div class='well'>
		<?php echo $form->textFieldRow($model,'dni', array('value'=>$model->dni, 'readonly'=>'false')); ?>
		<?php echo $form->passwordFieldRow($model,'password', array('value'=>$model->password, 'readonly'=>'false')); ?>
		</div>
		<div class='well'>
		<?php echo $form->textFieldRow($model,'username', array('value'=>$model->username, 'class'=>'span4', 'readonly'=>'false')); ?>
		<?php echo $form->textFieldRow($model,'email', array('value'=>$model->email, 'class'=>'span5', 'readonly'=>'false')); ?>
		<?php echo $form->textFieldRow($model,'street', array('value'=>$model->street, 'class'=>'span6','readonly'=>'false')); ?>
		<?php echo $form->textFieldRow($model,'street_number', array('value'=>$model->street_number, 'class'=>'span2','readonly'=>'false')); ?>
		<?php echo $form->textFieldRow($model,'sexo', array('value'=>$model->sexo, 'class'=>'span2','readonly'=>'false')); ?>
		<?php echo $form->textFieldRow($model,'fecha_alta', array('value'=>$model->fecha_alta, 'class'=>'span2', 'readonly'=>'false')); ?>

	<?php $this->endWidget(); ?>
	</div>
</div>
