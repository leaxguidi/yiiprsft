<?php
$this->breadcrumbs=array(
	'Zonas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Zonas','url'=>array('index')),
	array('label'=>'Create Zonas','url'=>array('create')),
	array('label'=>'Update Zonas','url'=>array('update','id'=>$model->zoneid)),
	array('label'=>'Delete Zonas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->zoneid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zonas','url'=>array('admin')),
);
?>

<h1>View Zonas #<?php echo $model->zoneid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'zoneid',
		'name',
		'description',
		'employees',
		'lati',
		'lngi',
		'latf',
		'lngf',
	),
)); ?>
