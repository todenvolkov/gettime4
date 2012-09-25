<?php
$this->breadcrumbs=array(
	'Business Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusinessTypes', 'url'=>array('index')),
	array('label'=>'Create BusinessTypes', 'url'=>array('create')),
	array('label'=>'View BusinessTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BusinessTypes', 'url'=>array('admin')),
);
?>

<h1>Update BusinessTypes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>