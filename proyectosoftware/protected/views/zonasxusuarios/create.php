<?php
$this->breadcrumbs=array(
	'Zonasxusuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Zonasxusuarios','url'=>array('index')),
	array('label'=>'Manage Zonasxusuarios','url'=>array('admin')),
);
?>

<h1>Create Zonasxusuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>