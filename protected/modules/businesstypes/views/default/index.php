<?php
$this->breadcrumbs=array(
	'Business Types',
);

$this->menu=array(
	array('label'=>'Create BusinessTypes', 'url'=>array('create')),
	array('label'=>'Manage BusinessTypes', 'url'=>array('admin')),
);
?>

<h1>Business Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
