<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('token')); ?>:</b>
	<?php echo CHtml::encode($data->token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payerID')); ?>:</b>
	<?php echo CHtml::encode($data->payerID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paymentType')); ?>:</b>
	<?php echo CHtml::encode($data->paymentType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currencyCodeType')); ?>:</b>
	<?php echo CHtml::encode($data->currencyCodeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ack')); ?>:</b>
	<?php echo CHtml::encode($data->ack); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transactionId')); ?>:</b>
	<?php echo CHtml::encode($data->transactionId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('transactionType')); ?>:</b>
	<?php echo CHtml::encode($data->transactionType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orderTime')); ?>:</b>
	<?php echo CHtml::encode($data->orderTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amt')); ?>:</b>
	<?php echo CHtml::encode($data->amt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currencyCode')); ?>:</b>
	<?php echo CHtml::encode($data->currencyCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feeAmt')); ?>:</b>
	<?php echo CHtml::encode($data->feeAmt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taxAmt')); ?>:</b>
	<?php echo CHtml::encode($data->taxAmt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paymentStatus')); ?>:</b>
	<?php echo CHtml::encode($data->paymentStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pendingReason')); ?>:</b>
	<?php echo CHtml::encode($data->pendingReason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reasonCode')); ?>:</b>
	<?php echo CHtml::encode($data->reasonCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ErrorCode')); ?>:</b>
	<?php echo CHtml::encode($data->ErrorCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ErrorShortMsg')); ?>:</b>
	<?php echo CHtml::encode($data->ErrorShortMsg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ErrorLongMsg')); ?>:</b>
	<?php echo CHtml::encode($data->ErrorLongMsg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ErrorSeverityCode')); ?>:</b>
	<?php echo CHtml::encode($data->ErrorSeverityCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserEmail')); ?>:</b>
	<?php echo CHtml::encode($data->UserEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmailSent')); ?>:</b>
	<?php echo CHtml::encode($data->EmailSent); ?>
	<br />

	*/ ?>

</div>