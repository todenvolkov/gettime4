<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guid')); ?>:</b>
	<?php echo CHtml::encode($data->guid); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('tip_number')); ?>:</b>
    	<?php echo CHtml::encode($data->tip_number); ?>
    	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('untillDate')); ?>:</b>
	<?php echo CHtml::encode(    CLocale::getInstance('ru')->dateFormatter->formatDateTime($data->untillDate,'short',null) ); ?>


	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('untillTime')); ?>:</b>
	<?php echo CHtml::encode(CLocale::getInstance('ru')->dateFormatter->formatDateTime($data->untillTime,null,'short')); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('gamename')); ?>:</b>
	<?php echo CHtml::encode($data->gamename); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('championship')); ?>:</b>
    	<?php echo CHtml::encode($data->championship); ?>
    	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stavka')); ?>:</b>
	<?php echo CHtml::encode($data->stavka); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('ratio')); ?>:</b>
   	<?php echo CHtml::encode($data->ratio); ?>
   	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('victory')); ?>:</b>
	<?php echo CHtml::encode($data->victory); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('finalscore')); ?>:</b>
    	<?php echo CHtml::encode($data->finalscore); ?>
    	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />



</div>