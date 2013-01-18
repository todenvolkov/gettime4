<script type="text/javascript">
    $(document).ready(function(){
        $('a.statt').click(function(){
           ssss=this.id;

           $('div[id~="'+ssss+'"]').slideToggle();


        });
    })
</script>
<table class="table bordered">
               <thead>
                   <td colspan="2"><h1>Betting tips archive</h1></td>

              </thead>
<?php $style='';?>
    <?php $lastTipMonth='';?>
    <?php $lastTipDay=''; $rowSpan=1;?>
<?php foreach($tips as $tip):?>
        <?php if ($lastTipMonth!=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate'])):?>
            <tr><td  class="monthrow"><h2><?=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate'])?></h2>
            </td>
            <td>

                 <div class="row-fluid">
                        <div class="span9">
                             <a href="#" onclick="return false;" id="<?=Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate'])?>" class="statt">
                                <?php $block = ContentBlock::model()->find('code = :code', array(':code' => Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate'])));
                                    if ($block) echo $block->description;?>
                            </a>
                            <div class="row-fluid">
                                <div class="span12"><br>
                                    <div id="<?=Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate'])?>" style="display: none;">
                                      <p align="left"><?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", array("code" => Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate']))); ?>
                                      </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <a href="/records/<?=Yii::app()->dateFormatter->format('MMyyyy',$tip['untillDate'])?>">Daily statistics</a>
                        </div>

                 </div>


            </td>

            </tr>
            <?endif;?>
    <?php $lastTipMonth=Yii::app()->dateFormatter->format('MMMM yyyy',$tip['untillDate']);?>
    <?php $lastTipDay==Yii::app()->dateFormatter->format('dd',$tip['untillDate']); ?>
<?endforeach;?>
</table>

