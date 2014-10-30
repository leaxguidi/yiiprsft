<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('visitid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->visitid),array('view','id'=>$data->visitid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patientid')); ?>:</b>
	<?php echo CHtml::encode($data->patientid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zoneid')); ?>:</b>
	<?php echo CHtml::encode($data->zoneid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visitdate')); ?>:</b>
	<?php echo CHtml::encode($data->visitdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employeeid')); ?>:</b>
	<?php echo CHtml::encode($data->employeeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lon')); ?>:</b>
	<?php echo CHtml::encode($data->lon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visited')); ?>:</b>
	<?php echo CHtml::encode($data->visited); ?>
	<br />

	*/ ?>

</div>