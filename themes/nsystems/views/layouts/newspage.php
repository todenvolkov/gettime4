<?php include "_header.php"; ?>

 <div class="row-fluid">
     <section class="tips">

         <div class="span6 framemiddle_newspage">
             <div class="frametop2"><img src="/img/blank.gif" width="1" height="13"></div>

             <h1 class="date"><span class="todays"><a href="http://bettime.info/">Live betting tips <?=date('d.m.Y',time())?></a></span>  </h1>



             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13"></div>
             </div>


         <div class="span6 framemiddle_newspage">
             <div class="frametop2"><img src="/img/blank.gif" width="1" height="13"></div>
             <h1 class="date"><span class="todays"><a href="/records">Betting tips archive</a></span> </h1>


             <div class="framebottom"><img src="/img/blank.gif" width="1" height="13"></div>
         </div>
     </section>
  </div>



 <div class="row-fluid blackbg">
  <div class="span11 offset1">
        <content>
              <?=$content?>
        </content>

  </div>
 </div>

<?php include "_footer.php"; ?>
