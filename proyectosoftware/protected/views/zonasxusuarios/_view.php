<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('force_from')); ?>:</b>
	<?php echo CHtml::encode($data->force_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('force_to')); ?>:</b>
	<?php echo CHtml::encode($data->force_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zoneid')); ?>:</b>
	<?php echo CHtml::encode($data->zoneid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monday')); ?>:</b>
	<?php echo CHtml::encode($data->monday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tuesday')); ?>:</b>
	<?php echo CHtml::encode($data->tuesday); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('wednesday')); ?>:</b>
	<?php echo CHtml::encode($data->wednesday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thursday')); ?>:</b>
	<?php echo CHtml::encode($data->thursday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('friday')); ?>:</b>
	<?php echo CHtml::encode($data->friday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday')); ?>:</b>
	<?php echo CHtml::encode($data->saturday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sunday')); ?>:</b>
	<?php echo CHtml::encode($data->sunday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('worktime')); ?>:</b>
	<?php echo CHtml::encode($data->worktime); ?>
	<br />

	*/ ?>

</div>