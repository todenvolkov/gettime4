<div class="row">
    <div class="span10"><h1>Bettime news</h1></div>
</div>
<div class="post">
    <div class="row">
        <div class="span2">
            <h3><span class="bet"<?php echo CHtml::link(Yii::app()->dateFormatter->format('dd MMMM y',$data->date), array('/news/news/show/', 'title' => $data->alias));?></span></h3>
            </div>
        <div class="span10">
            <h3><span class="time"><?php echo CHtml::link($data->title, array('/news/news/show/', 'title' => $data->alias));?></span></h3>
        </div>
    </div>
    <div class="row">
    <div class="content span10 offset2">
        <p><?php echo $data->full_text; ?></p>
    </div>
        </div>
</div>
