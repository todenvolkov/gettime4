<?php
$this->breadcrumbs=array(
	'Tips'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tips', 'url'=>array('index')),
	array('label'=>'Create Tips', 'url'=>array('create')),
	array('label'=>'View Tips', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<h1>Update Tips <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>