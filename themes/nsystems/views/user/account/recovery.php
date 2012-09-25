<?php $this->pageTitle = Yii::t('user', 'Password Recovery'); ?>

<h1>Password Recovery</h1>

<?php $this->widget('application.modules.yupe.widgets.YFlashMessages'); ?>


<p>To recover your password, please enter your email.</p>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
                                                         'id' => 'recovery-password-form',
                                                         'enableClientValidation' => true
                                                    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email') ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('recover my password'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->