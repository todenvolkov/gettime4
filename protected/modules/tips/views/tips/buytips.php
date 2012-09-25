<div class="row">
<div class="span12">
<h1>Please, confirm you order</h1>
</div>
</div>
    <div class="row">
        <div class="span12">
<table class="table table-striped">
               <thead>
                   <td>Match Date&time</td>

                   <td>Odds</td>
                   <td>Price</td>
              </thead>
<?php $style='';?>
<?php foreach($shoppingCart as $tipa):?>
<tr>
    <td><?=Yii::app()->dateFormatter->format('y-MM-dd',$tipa['untillDate'])?>&nbsp;
        <?=Yii::app()->dateFormatter->format('kk:mm',$tipa['untillTime'])?>
    </td>

    <td><?=$tipa['ratio']?></td>
    <td><?=$tipa['price']?> Euro</td>
    </tr>
<?endforeach;?>
<tr>
    <td colspan="3">Total: <?=$total?>Euro</td>
</tr>
    </table>
</div>

</div>
        <div class="row">
            <div class="span12"><?php  $this->widget('application.modules.tips.widgets.AdvertisementWidget',array('total'=>$total));?>
            </div>
        </div>