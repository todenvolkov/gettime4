<table class="table bordered">
               <thead>
                   <td><h1>Betting tips archive</h1></td>
              </thead>
<?php $style='';?>
    <?php $lastTipMonth='';?>
    <?php $lastTipDay=''; $rowSpan=1;?>
<?php foreach($tips as $tip):?>
        <?php if ($lastTipMonth!=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate'])):?>
            <tr><td  class="monthrow"><h2><a href="/records/<?=Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate'])?>">
               <?=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate'])?> >></a></h2>
            </td></tr>
            <?endif;?>
    <?php $lastTipMonth=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate']);?>
    <?php $lastTipDay==Yii::app()->dateFormatter->format('dd',$tip['untillDate']); ?>
<?endforeach;?>
</table>

