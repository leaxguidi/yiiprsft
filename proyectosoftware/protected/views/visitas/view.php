<?php
$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->visitid,
);

$this->menu=array(
	array('label'=>'List Visitas','url'=>array('index')),
	array('label'=>'Create Visitas','url'=>array('create')),
	array('label'=>'Update Visitas','url'=>array('update','id'=>$model->visitid)),
	array('label'=>'Delete Visitas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->visitid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Visitas','url'=>array('admin')),
);
?>

<h1>View Visitas #<?php echo $model->visitid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'visitid',
		'patientid',
		'zoneid',
		'visitdate',
		'employeeid',
		'address',
		'lat',
		'lon',
		'visited',
	),
)); ?>
