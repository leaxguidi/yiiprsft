<?php
$this->breadcrumbs=array(
	'Visitar',
); ?>

<h1>Pacientes a visitar</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'visitas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'visitid',
		'patientid',
		'zoneid',
		'visitdate',
		'employeeid',
		'address',		
		'lat',
		'lon',
		/*
		'visited',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>