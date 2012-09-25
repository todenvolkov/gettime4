<?php
	$url= Yii::app()-> request-> hostInfo.$this-> createUrl('account/recoveryPassword',array('code'=> $model-> code));
?>
<html>
<head>
    <title><?php echo Yii::t('user', 'Reset password on "{site}".',array('{site}' => CHtml::encode(Yii::app()->name)));?></title>
</head>
<body>
<?php echo Yii::t('user', 'Reset password on "{site}".',array('{site}' => CHtml::encode(Yii::app()->name)));?>
<br/>

<?php echo Yii::t('user', 'Somebody, maybe you, want to reset password on "{site}".',array('{site}' => CHtml::encode(Yii::app()->name)));?>
<br/>
<?php echo Yii::t('user', 'If it"s not you - just delete this message.');?>
<br/>

<?php echo Yii::t('user', 'For reseting your password, follow ');?> <a href='<?php echo $url; ?>'><?php echo Yii::t('user', 'this link');?></a>
<br/>

<?php echo $url; ?>

<br/><br/>

<?php echo Yii::t('user', '"{site}" !',array('{site}' => CHtml::encode(Yii::app()->name)));?>
</body>
</html>