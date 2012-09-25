<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'paypal-orders-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'token',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'payerID',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'paymentType',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'currencyCodeType',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'ack',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'transactionId',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'transactionType',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'orderTime',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'amt',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'currencyCode',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'feeAmt',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'taxAmt',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'paymentStatus',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'pendingReason',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'reasonCode',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'ErrorCode',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'ErrorShortMsg',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'ErrorLongMsg',array('class'=>'span5','maxlength'=>1000)); ?>

	<?php echo $form->textFieldRow($model,'ErrorSeverityCode',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'UserEmail',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'EmailSent',array('class'=>'span5','maxlength'=>500)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
