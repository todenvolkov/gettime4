<?php
$this->breadcrumbs=array(
	'Tips'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tips', 'url'=>array('index')),
	array('label'=>'Create Tips', 'url'=>array('create')),
	array('label'=>'Update Tips', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tips', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<h1>View Tips #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'guid',
        'tip_number',
		'untillDate',
		'untillTime',

		'gamename',
        'championship',
		'stavka',
        'ratio',
		'victory',
        'finalscore',
		'price',
	),
)); ?>
