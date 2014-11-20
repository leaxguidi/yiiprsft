<?php
$this->breadcrumbs=array(
	'Zonasxusuarioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Zonasxusuarios','url'=>array('index')),
	array('label'=>'Create Zonasxusuarios','url'=>array('create')),
	array('label'=>'View Zonasxusuarios','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Zonasxusuarios','url'=>array('admin')),
);
?>

<h1>Update Zonasxusuarios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>