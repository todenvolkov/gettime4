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
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '441551729247176', // App ID
      channelUrl : '//bettime.info/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

      FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
              // connected
          } else if (response.status === 'not_authorized') {
              // not_authorized
              login();
          } else {
              // not_logged_in
              login();
          }
      });
      };

  function login() {
      FB.login(function(response) {
          if (response.authResponse) {
              testAPI();
              // connected
          } else {
              testAPI();
              // cancelled
          }
      });
  }
  function testAPI() {
      console.log('Welcome!  Fetching your information.... ');
      FB.api('/me', function(response) {
          console.log('Good to see you, ' + response.name + '.');
      });
  }


  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>

<!--<div id="fb-root"></div>-->
<!--<script>(function(d, s, id) {-->
<!--  var js, fjs = d.getElementsByTagName(s)[0];-->
<!--  if (d.getElementById(id)) return;-->
<!--  js = d.createElement(s); js.id = id;-->
<!--  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";-->
<!--  fjs.parentNode.insertBefore(js, fjs);-->
<!--}(document, 'script', 'facebook-jssdk'));</script>-->

<div class="container" id="main">
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
            <div class="offset2 span4  greenbg"><p class="ident">

                <?php if (!Yii::app()->user->isAuthenticated()) { ?>
                <form action="/login" method="POST">
                    <div class="row-fluid">
                        <div class="span12"><p class="ident">Already a member? Login please</P></div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3"><label class="labelinline">Your email</label></div>
                        <div class="span9"><input class="inputinline" type="text" name="LoginForm[email]"
                                                  id="LoginForm_email"></div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3"><label class="labelinline">Password</label></div>
                        <div class="span9"><input class="inputinline" type="password" name="LoginForm[password]"
                                                  id="LoginForm_password" size="10"></div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">&nbsp</div>
                        <div class="span4">
                            <input type="submit" value="Login" class="btn btn-large btn-success loginbutton">
                        </div>
                        <div class="span3">
                            <P class="ident labelinline"><a
                                    href="<?=Yii::app()->request->baseUrl?>/user/account/registration">Registration</a>
                            </P>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">&nbsp</div>
                        <div class="span4">or <fb:login-button
                        registration-url="http://bet.rus:8080/user/account/registration" /></div>
                    </div>
                </form>
                    </div>

                    <?php
            }
            else {
                ?>
                Hello <a
                        href="<?=Yii::app()->request->baseUrl?>/user/people/<?=Yii::app()->user->getName()?>"><?=Yii::app()->user->getName()?></a>
                <a href="<?=Yii::app()->request->baseUrl?>/logout">Log out</a> <?php } ?>
                </p>


            </div>

            <div class="row">
                <div class="span2 offset10"><img src="/img/blank.gif" width="111" height="98" alt="betting"></div>
            </div>
            <div class="row">
                <nav style="padding-left:20px">
                    <?php  $this->widget('application.modules.menu.widgets.TopMenuWidget');?>
                </nav>
            </div>
        </div>
    </div>