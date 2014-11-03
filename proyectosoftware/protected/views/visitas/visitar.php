<?php
$this->breadcrumbs=array(
	'Visitar',
); ?>

<h1>Pacientes a visitar</h1>

<?php 
	//print_r($model);
	foreach ($model as $data) {
		echo "Direccion: ".$data->attributes['address']."<br>";
		echo "Lat: ".$data->attributes['lat']."<br>";
		echo "Lon: ".$data->attributes['lon']."<br><br>";
	}

 ?>

<!--<?php $this->widget('bootstrap.widgets.TbGridView',array(
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
)); ?>-->
