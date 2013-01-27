<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en" xmlns:8="http://www.w3.org/1999/html"><!--<![endif]-->
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container" id="">
    <div class="row">
                   <div class="span2 offset10"><img src="/img/blank.gif" width="111" height="10" alt="betting"></div>
               </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span8">
                    <div class="row-fluid">
                        <div class="span3">
                            <a href="/"><img src="/img/ball.png" width="60" height="60" class="ball" alt="ball"></a>
                        </div>
                        <div class="span8">
                            <div class="logo"><a href="/"><span class="bet logo">BET</span><span class="time logo">TIME</span></a></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span10 offset2"><h2 class="slogan">it's time to make a bet</h2></div>
                    </div>
                </div>




            </div>



        </div>
    </div>


      <div class="row-fluid blackbg">
       <div class="span11 offset1">
             <content>
                   <?=$content?>
             </content>

       </div>
      </div>
  </div>
    </div>
    </div>



<div id="footer">
    <footer>
    <div class="row-fluid">
      <span class="span12">

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



</body>
</html>

