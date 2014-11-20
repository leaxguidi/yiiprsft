<?php
$this->breadcrumbs=array(
	'Zonasxusuarioses',
);

$this->menu=array(
	array('label'=>'Create Zonasxusuarios','url'=>array('create')),
	array('label'=>'Manage Zonasxusuarios','url'=>array('admin')),
);
?>

<h1>Zonasxusuarioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
