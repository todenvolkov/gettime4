<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta name="language" content="<?=Yii::app()->language?>" />
<meta name="keywords" content="<?=$this->keywords?>" />
<meta name="description" content="<?=$this->description?>" />
    <meta name="Distribution" content="GLOBAL" />
    <meta name="revisit-after" content="1 day" />
    <META HTTP-EQUIV="expires" content="0">
    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META NAME="Classification" CONTENT="Sports Gambling">
    <META NAME="ROBOTS" CONTENT="ALL">

    <link href="http://bettime.info/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="http://bettime.info/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<!-- CSS: screen, mobile & print are all in the same file -->

<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/themes/nsystems/css/style.css" media="all" />
    <title> <?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<body>
<div class="container" id="main">
<div class="row">
  <div class="span-12">
      <div class="row"><span class="span12"><img src="/img/blank.gif" height="30" width="30" alt="bet"> </span> </div>
      <div class="row">
        <div class="span1"><a href="#"><img src="/img/ball.png" width="60" height="60" class="ball" alt="ball"></a></div>
        <div class="span3"><span class="logo"><a href="#"><span class="bet logo">BET</span><span class="time logo">TIME</span></a></span></div>
        <div class="span3 offset5"><p class="ident">
            <?php if (!Yii::app()->user->isAuthenticated()) { ?>
              <a href="<?=Yii::app()->request->baseUrl?>/login">Sign in</a> / <a href="<?=Yii::app()->request->baseUrl?>/user/account/registration">Registration</a> <?php } else { ?>
               Hello <a href="<?=Yii::app()->request->baseUrl?>/user/people/<?=Yii::app()->user->getName()?>"><?=Yii::app()->user->getName()?></a> <a href="<?=Yii::app()->request->baseUrl?>/logout">Log out</a> <?php } ?>
            </p></div>

      </div>
      <div class="row">
          <div class="span3 offset1"><h2 class="slogan">it's time to make a bet</h2></div>
      </div>
      <div class="row">
          <div class="span2 offset10"><img src="/img/blank.gif" width="111" height="103" alt="betting"></div>
      </div>
      <div class="row">
    <nav style="padding-left:20px">
        <?php  $this->widget('application.modules.menu.widgets.TopMenuWidget');?>
    </nav>
          </div>
  </div>
    </div>

 <div class="row">
     <section class="tips">

         <div class="span6 framemiddle">
             <div class="frametop"><img src="/img/blank.gif" width="1" height="13" alt="betting"></div>

             <h1 class="date"><span class="todays">Today's</span> betting tips:  <?=date('d.m.Y',time())?> </h1>
             <form action='/paypal/checkout' METHOD='POST' class="paypal_submit">
            <div class="autoheighttips">
            <table class="table bordered medium" >
                <thead>
                <td class="choosecolumn"style="width: 52px;">Choose</td>
                <td class="col1">Tip #</td>
                    <td class="col2">Time (UTC)</td>
                    <td class="col3">Odd</td>
                    <td class="col4">Price</td>

                </thead>
                <?php  $this->widget('application.modules.tips.widgets.TipsForSale');?>

            </table>

            </div>
             <div id="summary"></div>

            <?php if (Yii::app()->user->isAuthenticated())
{?>
             	<input type='image' name='paypal_submit' id='paypal_submit'  src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' border='0' align='top' alt='Pay with PayPal'/>
<?php } else {?> <p class="ident">Please, <a href="<?=Yii::app()->request->baseUrl?>/user/account/registration">register</a> or <a href="<?=Yii::app()->request->baseUrl?>/login">sign in</a> to buy tips</p>  <?php } ?>
             </form>
             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13" alt="betting tips"></div>
             </div>




         <div class="span6 framemiddle">
             <div class="frametop"><img src="/img/blank.gif" width="1" height="13" alt="betting tips"></div>
             <h2 class="date"><span class="todays">Last</span> results </h2>
             <div class="autoheighttips">
             <table class="table bordered small">
                 <thead>
                     <td><span class="s">Date</span></td>
                     <td><span class="s">Time</span></td>
                     <td><span class="s">Gamename</span></td>
                     <td><span class="s">Bet</span></td>
                     <td><span class="s">Odd</span></td>
                     <td><span class="s">Score</span></td>
                     <td><span class="s">Result</span></td>
                </thead>
                 <?php  $this->widget('application.modules.tips.widgets.TipsArchive');?>
              </table>
                 </div>
             <p class="ident"><a href="<?=Yii::app()->request->baseUrl?>/records">See other records>></a></p>
             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13" alt="betting tips"></div>
         </div>
     </section>
 </div>



 <div class="row">
  <div class="span12">
      <content>
      <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", array("code" => "homepage")); ?>
      <?=$content?>
      </content>

  </div>
 </div>
<div class="row content">
        <?php $this->widget("application.modules.news.widgets.LastNewsWidget"); ?>
</div>



<div id="footer">
    <footer>
      <div class="row ">
        <span class="span12">
            <nav class="">
              <?php  $this->widget('application.modules.menu.widgets.BottomMenuWidget');?>
            </nav>
        </span>
      </div>
</div>
    <aside>Partners: <a href="http://www.livescore.in/" title="Livescore" target="_blank">Livescore</a></aside>
</div>

<!--[if lt IE 9]>
<script src="<?=Yii::app()->request->baseUrl?>/themes/nsystems/js/html5.js" type="text/javascript"></script>
<![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33654938-4']);
  _gaq.push(['_setDomainName', 'bettime.info']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</footer>

<!-- Add Digital goods in-context experience. Ensure that this script is added before the closing of html body tag -->

<script src='https://www.paypalobjects.com/js/external/dg.js' type='text/javascript'></script>


<script>

	var dg = new PAYPAL.apps.DGFlow(
	{
		trigger: 'paypal_submit',
		expType: 'instant'
		 //PayPal will decide the experience type for the buyer based on his/her 'Remember me on your computer' option.
	});

</script>

</body>
</html>

