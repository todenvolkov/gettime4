<?php
$this->breadcrumbs=array(
	'Tips',
);

$this->menu=array(
	array('label'=>'Create Tips', 'url'=>array('create')),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<h1>Tips</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
