<h1 class="ident">
               <?=Yii::app()->dateFormatter->format('MMMM yyyy',$tips[0]['untillDate'])?> records and <a href="#stats">statistics</a></h1>
<table class="table bordered medium">
               <thead>

                   <td>Date</td>
                   <td>Tip #</td>
                   <td>Time</td>
                   <td>Championship</td>
                   <td>Game</td>
                   <td>Bet</td>
                   <td>Odds</td>
                   <td>Score</td>
                   <td>Result</td>
              </thead>
<?php $style='';?>
    <?php $lastTipMonth='';?>
    <?php $lastTipDay=''; $rowSpan=1;?>
<?php foreach($tips as $tip):?>

<tr>
    <td
    <?php if ($lastTipDay==Yii::app()->dateFormatter->format('dd',$tip['untillDate'])) {?>
        <?php $rowSpan++;?>

            rowspan="<?=$rowSpan?>">
        <?php } else {  ?>
        ><?=Yii::app()->dateFormatter->format('dd.MM.yy',$tip['untillDate'])?>
        <?php $rowSpan=1; ?>
    <?php } ?>

       </td>
    <td><?=$tip['tip_number']?></td>
       <td><?=Yii::app()->dateFormatter->format('HH:mm',$tip['untillTime'])?></td>
    <td><?=$tip['championship']?></td>
    <td><?=$tip['gamename']?></td>
    <td><?=$tip['stavka']?></td>
    <td><?=Yii::app()->numberFormatter->format('#.00',$tip['ratio'])?></td>
    <td><?=$tip['finalscore']?></td>
    <?php if (mb_strtoupper($tip['victory'])==mb_strtoupper('win')) $style='btn-success';
       else if (mb_strtoupper($tip['victory'])==mb_strtoupper('draw')) $style='btn-warning';
       else if (mb_strtoupper($tip['victory'])==mb_strtoupper('postp')) $style='btn';
       else if (mb_strtoupper($tip['victory'])==mb_strtoupper('aband')) $style='btn';
       else if (mb_strtoupper($tip['victory'])==mb_strtoupper('post')) $style='btn';
       else if (mb_strtoupper($tip['victory'])==mb_strtoupper('lose')) $style='btn-danger';
       else $style='btn';
       ?>
     <td><a href="#" class="btn <?=$style?>"><?=mb_strtoupper($tip['victory'])?></a></td>
    </tr>
    <?php $lastTipMonth=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate']);?>
    <?php $lastTipDay==Yii::app()->dateFormatter->format('dd',$tip['untillDate']); ?>
<?endforeach;?>
</table>
    <div class="row-fluid">
        <div class="span10 offset1">
    <a name="stats"></a><h1>Statistics</h1>
<?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", array("code" => Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate']))); ?>
        </div>
    </div>