<?php
$this->breadcrumbs=array(
	'Paypal Orders',
);

$this->menu=array(
	array('label'=>'Create PaypalOrders','url'=>array('create')),
	array('label'=>'Manage PaypalOrders','url'=>array('admin')),
);
?>

<h1>Paypal Orders</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
