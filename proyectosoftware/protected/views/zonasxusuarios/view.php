<?php
/* @var $this ZonasxusuariosController */
/* @var $model Zonasxusuarios */

$this->breadcrumbs=array(
	'Zonasxusuarioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Zonasxusuarios', 'url'=>array('index')),
	array('label'=>'Create Zonasxusuarios', 'url'=>array('create')),
	array('label'=>'Update Zonasxusuarios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Zonasxusuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zonasxusuarios', 'url'=>array('admin')),
);
?>

<h1>View Zonasxusuarios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'force_from',
		'force_to',
		'zoneid',
		'userid',
		'monday',
		'tuesday',
		'wednesday',
		'thursday',
		'friday',
		'saturday',
		'sunday',
		'time',
		'worktime',
	),
)); ?>
