<?php
$this->breadcrumbs=array(
	'Zonas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Zonas','url'=>array('index')),
	array('label'=>'Manage Zonas','url'=>array('admin')),
);
?>

<h1>Create Zonas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>