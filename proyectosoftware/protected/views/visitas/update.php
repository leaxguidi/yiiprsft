<?php
$this->breadcrumbs=array(
	'Visitases'=>array('index'),
	$model->visitid=>array('view','id'=>$model->visitid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Visitas','url'=>array('index')),
	array('label'=>'Create Visitas','url'=>array('create')),
	array('label'=>'View Visitas','url'=>array('view','id'=>$model->visitid)),
	array('label'=>'Manage Visitas','url'=>array('admin')),
);
?>

<h1>Update Visitas <?php echo $model->visitid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>