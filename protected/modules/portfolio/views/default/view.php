<?php
$this->breadcrumbs=array(
	'Portfolios'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Portfolio', 'url'=>array('index')),
	array('label'=>'Create Portfolio', 'url'=>array('create')),
	array('label'=>'Update Portfolio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Portfolio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Portfolio', 'url'=>array('admin')),
);
?>

<h1>View Portfolio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'href',
		'fullDescription',
		'month',
		'year',
		'businessType',
		'siteType',
		'currentState',
		'shortDescription',
	),
)); ?>
