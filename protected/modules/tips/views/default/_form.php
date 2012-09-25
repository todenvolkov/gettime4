<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tips-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'guid'); ?>
		<?php echo $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'guid'); ?>
	</div>
    <div class="row">
    		<?php echo $form->labelEx($model,'tip_number'); ?>
    		<?php echo $form->textField($model,'tip_number',array('size'=>60,'maxlength'=>64)); ?>
    		<?php echo $form->error($model,'tip_number'); ?>
    	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'untillDate'); ?>
        <?php if (!isset($model->untillDate)) $model->untillDate=date('Y-m-d');?>
		<?php echo $form->textField($model,'untillDate'); ?>
		<?php echo $form->error($model,'untillDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'untillTime'); ?>
		<?php echo $form->textField($model,'untillTime'); ?>
		<?php echo $form->error($model,'untillTime'); ?>
	</div>

    <div class="row">
   		<?php echo $form->labelEx($model,'championship'); ?>
   		<?php echo $form->textField($model,'championship',array('size'=>60,'maxlength'=>255)); ?>
   		<?php echo $form->error($model,'championship'); ?>
   	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gamename'); ?>
		<?php echo $form->textField($model,'gamename',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'gamename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stavka'); ?>
		<?php echo $form->textField($model,'stavka',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'stavka'); ?>
	</div>
    <div class="row">
    		<?php echo $form->labelEx($model,'ratio'); ?>
    		<?php echo $form->textField($model,'ratio'); ?>
    		<?php echo $form->error($model,'ratio'); ?>
    	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'victory'); ?>
		<?php echo $form->textField($model,'victory'); ?>
		<?php echo $form->error($model,'victory'); ?>
	</div>
    <div class="row">
    		<?php echo $form->labelEx($model,'finalscore'); ?>
    		<?php echo $form->textField($model,'finalscore'); ?>
    		<?php echo $form->error($model,'finalscore'); ?>
    	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->