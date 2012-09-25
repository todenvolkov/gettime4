<html><title>Thank you for using bettime.info!</title>
<h1>Thanks for your order</h1>
<style>
    table th, table td
    {
        font-family: Calibri;
        padding: 3px 3px 7px 9px;
        
    }
</style>
<h1>Don't Close this window!</h1>
<h1>Look at your bought tips below!</h1>
<h2>We have also sent an email with your tips to your address!</h2>

<table border="1" cellpadding="2" cellspacing="2">
    <thead><td>Date</td><td>Number</td><td>Time</td><td>Championship</td><td>Game</td><td>Bet</td><td>Odd</td><td>Final Score</td><td>Bet result</td></thead>
<?php foreach($tips as $tip):?>
<tr>
    <td><span class="s"><?=Yii::app()->dateFormatter->format('dd.MM.yy',$tip['untillDate'])?></span></td>
    <td><span class="s"><?=$tip['tip_number']?></span> </td>
     <td>   <span class="s"><?=Yii::app()->dateFormatter->format('HH:mm',$tip['untillTime'])?></span>
    </td>
    <td><span class="s"><?=$tip['championship']?></span></td>
    <td><span class="s"><?=$tip['gamename']?></span></td>
    <td><span class="s"><?=$tip['stavka']?></span></td>

    <td><span class="s"><?=Yii::app()->numberFormatter->format('#.00',$tip['ratio'])?></span></td>
    <td><span class="s"><?=$tip['finalscore']?></span></td>
    <?php if (mb_strtoupper($tip['victory'])==mb_strtoupper('win')) $style='btn-success';
    else if (mb_strtoupper($tip['victory'])==mb_strtoupper('draw')) $style='btn-warning';
    else if (mb_strtoupper($tip['victory'])==mb_strtoupper('postp')) $style='btn-warning';
    else if (mb_strtoupper($tip['victory'])==mb_strtoupper('lose')) $style='btn-danger';
    ?>
    <td><a href="#" class="btn <?=$style?>"><?=mb_strtoupper($tip['victory'])?></a></td>
    </tr>
<?endforeach;?>
</table>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33654938-4']);
  _gaq.push(['_setDomainName', 'bettime.info']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_addTrans',
         '<?=$ThisPayPalOrder->id?>',           // order ID - required
         'Bettime.info', // affiliation or store name
         '<?=$ThisPayPalOrder->amt?>',          // total - required
         '<?=$ThisPayPalOrder->taxAmt?>',           // tax
         '0',          // shipping
         '',       // city
         '',     // state or province
         ''             // country
      ]);
      _gaq.push(['_addItem',
         '<?=$ThisPayPalOrder->id?>',           // order ID - necessary to associate item with transaction
         '<?=$tip->tip_number;?>',           // SKU/code - required
         'Tip #1',        // product name
         'Single tips',   // category or variation
         '<?php if ($ThisPayPalOrder->amt==50) echo '50';
          else if ($ThisPayPalOrder->amt==80) echo '40';
          else if ($ThisPayPalOrder->amt==99) echo '33';?>',          // unit price - required
         '1'               // quantity - required
      ]);
      _gaq.push(['_trackTrans']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</html>