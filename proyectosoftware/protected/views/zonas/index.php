<?php
$this->breadcrumbs=array(
	'Zonases',
);

$this->menu=array(
	array('label'=>'Create Zonas','url'=>array('create')),
	array('label'=>'Manage Zonas','url'=>array('admin')),
);
?>

<h1>Zonases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
