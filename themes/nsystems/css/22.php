<?php $filename="http://kinodivan.com".get_post_meta($post->ID, 'movieshop_cover_small', true); ?>

<img src="<?php thumbGen($filename,0,0);?>">

?>

<a href="http://kinodivan.com<?php echo get_post_meta($post->ID, 'movieshop_url', true); ?>?aid=3673&viewonline"><img src="http://hd-tube.ru/images/iframe_buttons/18/but_2.png" align="left"></a>


<a href="http://kinodivan.com<?php echo get_post_meta($post->ID, 'movieshop_url', true); ?>?aid=3673&viewonline">Смотреть <?php the_title(); ?> онлайн </a>



<div id='kp_promo11_1343605980'></div>
<script type="text/javascript">
 function downloadJSAtOnload() {
 var element = document.createElement("script");
 element.src = "http://hd-tube.ru/player/js_film2/<?php echo get_post_meta($post->ID, 'film_id', true); ?>/640/480/F33599/kp_promo11_1343605980?goout=0&aid=3673&encoding=utf8&control_skin=tube";
 document.getElementsByTagName('head')[0].appendChild(element);
 }
 if (window.addEventListener)
 window.addEventListener("load", downloadJSAtOnload, false);
 else if (window.attachEvent)
 window.attachEvent("onload", downloadJSAtOnload);
 else window.onload = downloadJSAtOnload;
</script>


<div id='kp_promo11_1349914298'></div>
<script type="text/javascript">
 function downloadJSAtOnload() {
 var element = document.createElement("script");
 element.src = "http://newhdfilms.ru/player/js_film2//640/480/F33599/kp_promo11_1349914298?goout=0&aid=3673&encoding=utf8&control_skin=";
 document.getElementsByTagName('head')[0].appendChild(element);
 }
 if (window.addEventListener)
 window.addEventListener("load", downloadJSAtOnload, false);
 else if (window.attachEvent)
 window.attachEvent("onload", downloadJSAtOnload);
 else window.onload = downloadJSAtOnload;
</script>


<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>