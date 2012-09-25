<html>

<head>
    <title><?php echo Yii::t('user', 'Successfull activation!');?></title>
</head>

<body>
	<?php echo Yii::t('user', 'You have successfully registered on "{site}" !',array('{site}' => CHtml::encode(Yii::app()->name))); ?>

	<br/><br/>

	<?php echo Yii::t('user', 'To activate your account, please follow this '); ?>
	<a href='<?php echo Yii::app()-> request-> hostInfo.$this-> createUrl('account/activate',array( 'key'=>$model->activate_key)); ?>
	?>'><?php echo Yii::t('user', 'link'); ?></a>

	<br/><br/>

	<?php  echo Yii::app()-> request-> hostInfo.$this-> createUrl('account/activate',array( 'key'=>$model->activate_key)); ?>

	<br/><br/>

	<?php echo Yii::t('user', '"{site}" !',array('{site}' => CHtml::encode(Yii::app()->name))); ?>

</body>

</html>
