

<div class="row-fluid blackbg">
<div class="span11 offset1">
      <content><h1>Free football betting tips</h1>
        <?php if (Yii::app()->user->isAuthenticated()) { ?>
            <?php $this->widget('application.modules.blog.widgets.LastPostsWidget');?>
        <?php }
          else
          { ?>
          <p>Since 15.10.2012 Free tips are available!</p>
              <h1>You are not logged in to view free tips. Please register or sign in</h1>
          <P> <a href="<?=Yii::app()->request->baseUrl?>/user/account/registration">Register</a> and <a href="/login">sign in</a> to get totally FREE Premium betting tips</p>
              <?php } ?> <P>Why free tips?</P>
                  <p>We make a lot of predictions every day, then we choose up to 6 tips, some of them, most reliable, become our main tips - you can buy them securely with PayPal.</p>
                      <P>Next, up to 3 reliable tips we put to bonus tips. </p><p>And there're a lot of very good tips left. So we decided to give you those tips for free!</P><br><br>



      </content>

</div>
</div>