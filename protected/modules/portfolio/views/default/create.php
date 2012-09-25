<?php
$this->breadcrumbs=array(
	'Portfolios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Portfolio', 'url'=>array('index')),
	array('label'=>'Manage Portfolio', 'url'=>array('admin')),
);
?>

<h1>Create Portfolio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>