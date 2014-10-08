<?php
$this->breadcrumbs=array(
	'Zonases'=>array('index'),
	$model->name=>array('view','id'=>$model->zoneid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Zonas','url'=>array('index')),
	array('label'=>'Create Zonas','url'=>array('create')),
	array('label'=>'View Zonas','url'=>array('view','id'=>$model->zoneid)),
	array('label'=>'Manage Zonas','url'=>array('admin')),
);
?>

<h1>Update Zonas <?php echo $model->zoneid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>