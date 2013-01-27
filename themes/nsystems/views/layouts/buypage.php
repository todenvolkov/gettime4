<?php include "_header.php"; ?>

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

<?php include "_footer.php"; ?>