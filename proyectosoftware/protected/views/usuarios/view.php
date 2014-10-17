<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Create Usuarios','url'=>array('create')),
	array('label'=>'Update Usuarios','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>

<h1>View Usuarios #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dni',
		'username',
		'street',
		'street_number',
		'sexo',
		'password',
		'email',
		'account_verification_code',
		'active',
		'fecha_alta',
		'fecha_ultimo_login',
		'user_type',
		'latitud',
		'longitud',
	),
)); ?>
