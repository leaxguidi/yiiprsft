<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('visitdate')); ?>:</b>
	<?php echo CHtml::encode($data->visitdate); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('patientid')); ?>:</b>
	<?php echo CHtml::encode($data->patient->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('lon')); ?>:</b>
	<?php echo CHtml::encode($data->lon); ?>
	<br />
	
	<input type="button" name="ver" value="Ver" id="ver"/>
	<input type="button" name="atender" value="Atender" id="atender"/>
	<br /><br />

</div>