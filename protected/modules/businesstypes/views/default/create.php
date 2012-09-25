<?php
$this->breadcrumbs=array(
	'Business Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusinessTypes', 'url'=>array('index')),
	array('label'=>'Manage BusinessTypes', 'url'=>array('admin')),
);
?>

<h1>Create BusinessTypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>