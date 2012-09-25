<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orderdate')); ?>:</b>
	<?php echo CHtml::encode($data->orderdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordersum')); ?>:</b>
	<?php echo CHtml::encode($data->ordersum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_status')); ?>:</b>
	<?php echo CHtml::encode($data->payment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_status')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_adress')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_adress); ?>
	<br />

	*/ ?>

</div>