<html>
<head>
    <title><?php echo Yii::t('user', 'Successfull activation!');?></title>
</head>
<body>
<?php echo Yii::t('user', 'Your account on "{site}" successfully activated!',array('{site}' => CHtml::encode(Yii::app()->name)));?>
<br/><br/>

<?php echo Yii::t('user', 'Now you can');?> <a
    href='<?php echo Yii::app()-> request-> hostInfo.$this-> createUrl('account/login'); ?>'><?php echo Yii::t('user', 'sign in');?></a>
!
<br/><br/>

<?php echo Yii::t('user', '"{site}" !',array('{site}' => CHtml::encode(Yii::app()->name)));?>

</body>
</html>