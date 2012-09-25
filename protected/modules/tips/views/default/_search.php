<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guid'); ?>
		<?php echo $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
	</div>
    <div class="row">
    		<?php echo $form->label($model,'tip_number'); ?>
    		<?php echo $form->textField($model,'tip_number',array('size'=>60,'maxlength'=>64)); ?>
    	</div>

	<div class="row">
		<?php echo $form->label($model,'untillDate'); ?>
		<?php echo $form->textField($model,'untillDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'untillTime'); ?>
		<?php echo $form->textField($model,'untillTime'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'gamename'); ?>
		<?php echo $form->textField($model,'gamename',array('size'=>60,'maxlength'=>500)); ?>
	</div>
    <div class="row">
    		<?php echo $form->label($model,'championship'); ?>
    		<?php echo $form->textField($model,'championship',array('size'=>60,'maxlength'=>255)); ?>
    	</div>

	<div class="row">
		<?php echo $form->label($model,'stavka'); ?>
		<?php echo $form->textField($model,'stavka',array('size'=>60,'maxlength'=>500)); ?>
	</div>
    <div class="row">
   		<?php echo $form->label($model,'ratio'); ?>
   		<?php echo $form->textField($model,'ratio'); ?>
   	</div>
	<div class="row">
		<?php echo $form->label($model,'victory'); ?>
		<?php echo $form->textField($model,'victory'); ?>
	</div>
    <div class="row">
    		<?php echo $form->label($model,'finalscore'); ?>
    		<?php echo $form->textField($model,'finalscore'); ?>
    	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->