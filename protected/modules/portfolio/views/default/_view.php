<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('href')); ?>:</b>
	<?php echo CHtml::encode($data->href); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortDescription')); ?>:</b>
	<?php echo CHtml::encode($data->fullDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('businessType')); ?>:</b>
	<?php
        $t=BusinessTypes::model()->findByPk($data->businessType);
    echo CHtml::encode($t->title); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('siteType')); ?>:</b>
	<?php echo CHtml::encode($data->siteType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currentState')); ?>:</b>
	<?php echo CHtml::encode($data->currentState); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullDescription')); ?>:</b>
	<?php echo CHtml::encode($data->shortDescription); ?>
	<br />



</div>