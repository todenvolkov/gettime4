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
<title><?=$this->title?></title>
<!-- CSS: screen, mobile & print are all in the same file -->

<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/themes/nsystems/css/style.css" media="all" />
    <title><?php echo CHtml::encode(Yii::app()->name);?> <?php echo CHtml::encode($this->pageTitle); ?></title>
<!--[if lt IE 9]>
<script src="<?=Yii::app()->request->baseUrl?>/themes/nsystems/js/html5.js" type="text/javascript"></script>
<![endif]-->
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
          <div class="span2 offset10"><img src="/img/euro.gif" width="111" height="103"></div>
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

             <h1 class="date"><span class="todays"><a href="/">Today's</a></span><a href="/"> betting tips <?=date('Y-m-d',time())?>  >>></a>  </h1>



             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13"></div>
             </div>


         <div class="span6 framemiddle">
             <div class="frametop"><img src="/img/blank.gif" width="1" height="13"></div>
             <h1 class="date"><span class="todays"><a href="/records">Yesterday's</a></span> <a href="/records">results >>></a> </h1>


             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13"></div>
         </div>
     </section>
  </div>



 <div class="row blackbg">
  <div class="span12">
        <content>
            <h1>Cart</h1>
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

    <!-- here comes the javascript -->
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    <!--<script src="/themes/nsystems/js/jquery-1.7.1.min.js" type="text/javascript"></script>-->
    <!--<script type="text/javascript" src="/themes/nsystems/js/slides.min.jquery.js"></script>-->
    <!--<script src="/themes/nsystems/js/common.js" type="text/javascript"></script>-->
    <!-- this is where we put our custom functions -->
    <!-- Asynchronous google analytics; this is the official snippet.
    	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>-->


</body>
</html>

