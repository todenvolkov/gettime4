<?php
$this->breadcrumbs=array(
	'Paypal Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PaypalOrders','url'=>array('index')),
	array('label'=>'Create PaypalOrders','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('paypal-orders-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Paypal Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'paypal-orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'token',
		'payerID',
		'paymentType',
		'currencyCodeType',
		'ack',
		/*
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
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
