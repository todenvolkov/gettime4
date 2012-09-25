<?php
$this->breadcrumbs=array(
	'Paypal Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PaypalOrders','url'=>array('index')),
	array('label'=>'Create PaypalOrders','url'=>array('create')),
	array('label'=>'Update PaypalOrders','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PaypalOrders','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaypalOrders','url'=>array('admin')),
);
?>

<h1>View PaypalOrders #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'token',
		'payerID',
		'paymentType',
		'currencyCodeType',
		'ack',
		'transactionId',
		'transactionType',
		'orderTime',
		'amt',
		'currencyCode',
		'feeAmt',
		'taxAmt',
		'paymentStatus',
		'pendingReason',
		'reasonCode',
		'ErrorCode',
		'ErrorShortMsg',
		'ErrorLongMsg',
		'ErrorSeverityCode',
		'UserEmail',
		'EmailSent',
	),
)); ?>
