<?php $this->pageTitle = Yii::t('user', 'Free user registration'); ?>

<h1>Free user registration</h1>

<div class='hint'>Please provide your email and password.</div>

<br/><br/>

<?php $this->widget('application.modules.yupe.widgets.YFlashMessages'); ?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'registration-form'));?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'nick_name'); ?>
        <?php echo $form->textField($model, 'nick_name') ?>
        <?php echo $form->error($model, 'nick_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email') ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password');?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cPassword'); ?>
        <?php echo $form->passwordField($model, 'cPassword');?>
        <?php echo $form->error($model, 'cPassword'); ?>
    </div>


    <?php if (Yii::app()->getModule('user')->showCaptcha): ?>
    <?php if (extension_loaded('gd')): ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha', array('showRefreshButton' => false)); ?>
                <?php echo $form->textField($model, 'verifyCode'); ?>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
            <div class="hint">
                Enter security code from the image
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>



    <div class="row submit">
        <?php echo CHtml::submitButton('Register free now!'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

