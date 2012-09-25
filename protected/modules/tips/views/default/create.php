<?php
$this->breadcrumbs=array(
	'Tips'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tips', 'url'=>array('index')),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<h1>Create Tips</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>