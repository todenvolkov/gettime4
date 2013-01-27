<?php include "_header.php"; ?>




 <div class="row-fluid">
     <section class="tips">

         <div class="span12 framemiddle">
             <div class="frametop"><img src="/img/blank.gif" width="1" height="13" alt="betting">

             <h1 class="date"><span class="todays">Live</span><b> betting tips</b>:  <?=date('d.m.Y',time())?> </h1>
             <form action='/paypal/checkout' METHOD='POST' class="paypal_submit">
            <div class="autoheighttips">
                <table class="table bordered small">
                    <thead>
                        <td><span class="s">Date</span></td>
                        <td><span class="s">Time</span></td>
                        <td><span class="s">Gamename</span></td>
                        <td><span class="s">Bet</span></td>
                        <td><span class="s">Odds</span></td>
                        <td><span class="s">Score</span></td>
                        <td><span class="s">Result</span></td>
                   </thead>
                    <?php  $this->widget('application.modules.tips.widgets.TipsArchive');?>
                 </table>


            </div>
             <div id="summary"></div>

            <?php if (Yii::app()->user->isAuthenticated())
{?>
             	<input type='image' name='paypal_submit' id='paypal_submit'  src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' border='0' align='top' alt='Pay with PayPal'/> <span class="ident">Instant tips after payment!</span>
<?php } else {?> <p class="ident">Please, <a href="<?=Yii::app()->request->baseUrl?>/user/account/registration">register</a> or <a href="<?=Yii::app()->request->baseUrl?>/login">sign in</a> to buy tips securely with PayPal</p>  <?php } ?>
             </form><p>&nbsp;</p></div>
             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13" alt="betting tips"></div>
             </div>





     </section>
 </div>


 <div class="row-fluid">
     <div class="span12 content"><h2>Plans and pricing</h2></div>
 </div>
    <div class="row-fluid">

     <div class="span12">
         <content>

             <table class="table">
                 <tr class="bigheight">
                     <td class=" noborder"></td>        <td class="borderbottom black">Free<br>Free forever</td><td class="borderbottom green">One month</td><td class="borderbottom black">One day</td><td class="borderbottom black">Only Two</td><td class="borderbottom black">Single</td>
                 </tr>
                 <tr>
                     <td class="borderbottom grey"><p class="blackfont">Tips price</p></td><td class="borderbottom grey2"><p class="blackfont"><img src="/img/cross.png" class="priceimage"></p></td>                  <td class="borderbottom green2"><p class="blackfont">~&#8364;15</p></td>    <td class="borderbottom grey2"><p class="blackfont">&#8364;33</p></td>      <td class="borderbottom grey2"><p class="blackfont">&#8364;40</p></td>      <td class="borderbottom grey2"><p class="blackfont">&#8364;50</p></td>
                 </tr>

                 <tr class="blackfont">
                     <td class="borderbottom grey"><p class="blackfont">Paid tips</p></td><td class="borderbottom grey2"><p class="blackfont"><img src="/img/cross.png" class="priceimage"></P></td>                  <td class="borderbottom green2"><p class="blackfont">90</p></td>    <td class="borderbottom grey2"><p class="blackfont">3</p></td>      <td class="borderbottom grey2"><p class="blackfont">2</p></td>      <td class="borderbottom grey2"><p class="blackfont">1</p></td>
                 </tr>
                 <tr>
                     <td class="borderbottom grey"><p class="blackfont">Bonus tips</P></td><td class="borderbottom grey2"><p class="blackfont"><img src="/img/cross.png" class="priceimage"></p></td>                  <td class="borderbottom green2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"></p></td>    <td class="borderbottom grey2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"></p></td>      <td class="borderbottom grey2"><p class="blackfont"><img src="/img/cross.png" class="priceimage"></p></td>      <td class="borderbottom grey2"><p class="blackfont"><img src="/img/cross.png" class="priceimage"></p></td>
                 </tr>
                 <tr>
                     <td class="borderbottom grey"><p class="blackfont">Free tips</p></td><td class="borderbottom grey2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"> </p></td>                  <td class="borderbottom green2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"></p></td>    <td class="borderbottom grey2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"></p></td>      <td class="borderbottom grey2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"></p></td>      <td class="borderbottom grey2"><p class="blackfont"><img src="/img/mark.png" class="priceimage"></p></td>
                 </tr>
<!--                 <tr class="blackfont">-->
<!--                             <td class="borderbottom grey"><p class="blackfont">Total tips count</p></td><td class="borderbottom grey2"><p class="blackfont">1-5</P></td>                  <td class="borderbottom green2"><p class="blackfont">~ 330</p></td>    <td class="borderbottom grey2"><p class="blackfont">~ 11</p></td>      <td class="borderbottom grey2"><p class="blackfont">~ 7</p></td>      <td class="borderbottom grey2"><p class="blackfont">~ 6</p></td>-->
<!--                         </tr>-->

                 <tr class="blackfont">
                             <td class="borderbottom grey"><p class="blackfont">Total price</p></td><td class="borderbottom grey2"><p class="blackfont">Free</P></td>                  <td class="borderbottom green2"><p class="blackfont">&#8364;1500</p></td>    <td class="borderbottom grey2"><p class="blackfont">&#8364;99</p></td>      <td class="borderbottom grey2"><p class="blackfont">&#8364;80</p></td>      <td class="borderbottom grey2"><p class="blackfont">&#8364;50</p></td>
                         </tr>
                 <tr>
                     <td class="noborder"></td><td class=" "><input type="submit" class="btn btn-info btn-large" value="Sign up"> </td>                  <td class=" "><input type="submit" class="btn btn-success btn-large" value="Sign up"></td>    <td class=" "><input type="submit" class="btn btn-info btn-large" value="Sign up"></td>      <td class=" "><input type="submit" class="btn btn-info btn-large" value="Sign up"></td>      <td class=""><input type="submit" class="btn btn-info btn-large" value="Sign up"></td>
                 </tr>
             </table>




         <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", array("code" => "homepage")); ?>
         <?=$content?>
         </content>

     </div>
    </div>

<?php include "_footer.php"; ?>