<?php
$this->breadcrumbs=array(
	'Paypal Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaypalOrders','url'=>array('index')),
	array('label'=>'Create PaypalOrders','url'=>array('create')),
	array('label'=>'View PaypalOrders','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PaypalOrders','url'=>array('admin')),
);
?>

<h1>Update PaypalOrders <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>