<?php $this->pageTitle = Yii::t('user', 'Change password'); ?>

<h1>Password recovery</h1>

<?php $this->widget('application.modules.yupe.widgets.YFlashMessages'); ?>


<p>Please, enter you new password!</p>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password') ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cPassword'); ?>
        <?php echo $form->passwordField($model, 'cPassword') ?>
    </div>


    <div class="row submit">
        <?php echo CHtml::submitButton('Change password'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->