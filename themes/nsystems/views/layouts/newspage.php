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
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title><?=$this->keywords?></title>
<!-- CSS: screen, mobile & print are all in the same file -->

<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/themes/nsystems/css/style.css" media="all" />
    <title><?php echo CHtml::encode(Yii::app()->name);?> <?php echo CHtml::encode($this->pageTitle); ?></title>
<!--[if lt IE 9]>
<script src="<?=Yii::app()->request->baseUrl?>/themes/nsystems/js/html5.js" type="text/javascript"></script>
<![endif]-->
    <script src="<?=Yii::app()->request->baseUrl?>/themes/nsystems/js/jquery-1.8.0.min.js" type="text/javascript"></script>

</head>
<body>
<div class="container" id="main">
<div class="row">
  <div class="span-12">
      <div class="row"><span class="span12"><img src="/img/blank.gif" height="30" width="30"> </span> </div>
      <div class="row">
        <div class="span1"><a href="/"><img src="/img/ball.png" width="60" height="60" class="ball"></a></div>
        <div class="span3"><h1 class="logo"><a href="/"><span class="bet logo">BET</span><span class="time logo">TIME</span></a></h1></div>
        <div class="span3 offset5"><p class="ident"><a href="/login">Sign in</a> / <a href="/user/account/registration">Registration</a></p></div>

      </div>
      <div class="row">
          <div class="span3 offset1"><h2 class="slogan">it's time to make a bet</h2></div>
      </div>
      <div class="row">
          <div class="span2 offset10"><img src="/img/blank.gif" width="111" height="103"></div>
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
             <div class="frametop"><img src="/img/blank.gif" width="1" height="13"></div>

             <h1 class="date"><span class="todays"><a href="/">Today's</a></span><a href="/"> betting tips <?=date('d.m.Y',time())?>  >>></a>  </h1>



             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13"></div>
             </div>


         <div class="span6 framemiddle">
             <div class="frametop"><img src="/img/blank.gif" width="1" height="13"></div>
             <h1 class="date"><span class="todays"><a href="/records">Last</a></span> <a href="/records">results >>></a> </h1>


             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13"></div>
         </div>
     </section>
  </div>



 <div class="row blackbg">
  <div class="span11 offset1">
        <content>
              <?=$content?>
        </content>

  </div>
 </div>
    </div>
<div id="footer">
    <footer>
    <div class="row ">
      <span class="span12">
          <nav class="dottedrow">
            <?php  $this->widget('application.modules.menu.widgets.BottomMenuWidget');?>
          </nav>
      </span>
    </div>
        </footer>
</div>

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

