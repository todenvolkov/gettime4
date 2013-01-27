<?php $this->pageTitle = Yii::t('user', 'Sign up to bettime.info'); ?>
<style>.rigthaligned{text-align: right;}
label
{
    color: white; font-size: 17px;
display: inline;
    font-family: Calibri,Tahoma;

}
.hint
{
    font-size: 12px;
}
.butt
{
    color:#333333;
    display:block;
    font-size:20px;
    height:54px;
    line-height:36px;
    outline:none;
    padding:4px 37px;
    text-align:center;
    margin-left: 144px;


}
    body
    {
        font-family: Calibri;
        font-size: 18px;
    }


</style>
<div class="row-fluid">
    <div class="span6">
<h1>Simple Registration</h1>
    <p>No contract. No Credit Card. Absolutely free.</p><p>&nbsp;</p>


<div class="form">

           <?php $form = $this->beginWidget('CActiveForm', array('id' => 'registration-form'));?>
           <div class="row-fluid">
               <?php if ($form->errorSummary($model)) { ?>
               <div class="span12 alert alert-error">
           <?php $this->widget('application.modules.yupe.widgets.YFlashMessages'); ?>
               <?php echo $form->errorSummary($model); ?></div> <?php } ?>

           </div>


           <div class="row-fluid">
               <div class="span3 rigthaligned"><?php echo $form->labelEx($model, 'nick_name'); ?></div>
                   <div class="span9">   <?php echo $form->textField($model, 'nick_name') ?>
               <?php if ($form->error($model, 'nick_name')) { ?><div class="alert alert-error"><?php echo $form->error($model, 'nick_name'); ?></div><?php } ?> </div>

           </div>

           <div class="row-fluid">
               <div class="span3 rigthaligned"><?php echo $form->labelEx($model, 'email'); ?></div>
               <div class="span9"><?php echo $form->textField($model, 'email') ?>
                <?php if ($form->error($model, 'email')) { ?>   <div class="alert alert-error"><?php echo $form->error($model, 'email'); ?></div> <?php } ?></div>

           </div>

           <div class="row-fluid">
               <div class="span3 rigthaligned"><?php echo $form->labelEx($model, 'password'); ?></div>
               <div class="span9"><?php echo $form->passwordField($model, 'password');?>

               <?php if ($form->error($model, 'password')) {?><div class="alert alert-error"><?php echo $form->error($model, 'password'); ?></div><?php } ?></div>

           </div>
    <div class="row-fluid">
        <div class="span3"></div>
    <div class="span9"> <p class="hint">Letters and numbers, minimum length is 3</P> </div>
    </div>
       <p>&nbsp;</p>
       <div class="row-fluid">
           <div class="span12 offset2">
               <input type="submit" class="butt" name="yt0" value="Register">
               <P>We will send you a confirmation with your entered data and then you will be redirected to home page</P>
           </div>
       </div>

           <?php $this->endWidget(); ?>
       </div><!-- form -->
    </div>

<div class="span6">
<div class="row-fluid">
    <h1>or Register with Facebook</h1>
    <p>Skip registration, use your Facebook account</p><p>&nbsp;</p>

</div>


    <iframe src="https://www.facebook.com/plugins/registration?
                 client_id=441551729247176&
                 redirect_uri=http%3A%2F%2Fbettingtips.cc%2Fuser%2Faccount%2Ffacebookregistration&
                 fields=name,birthday,gender,location,email"
            scrolling="auto"
            frameborder="no"
            style="border:none"
            allowTransparency="true"
            width="100%"
            height="330">
    </iframe>

</div>
    </div>


