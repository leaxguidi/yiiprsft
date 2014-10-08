<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('zoneid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->zoneid),array('view','id'=>$data->zoneid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employees')); ?>:</b>
	<?php echo CHtml::encode($data->employees); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lati')); ?>:</b>
	<?php echo CHtml::encode($data->lati); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lngi')); ?>:</b>
	<?php echo CHtml::encode($data->lngi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latf')); ?>:</b>
	<?php echo CHtml::encode($data->latf); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lngf')); ?>:</b>
	<?php echo CHtml::encode($data->lngf); ?>
	<br />

	*/ ?>

</div>