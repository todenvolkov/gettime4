<?php
$this->breadcrumbs=array(
	'Paypal Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PaypalOrders','url'=>array('index')),
	array('label'=>'Manage PaypalOrders','url'=>array('admin')),
);
?>

<h1>Create PaypalOrders</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>