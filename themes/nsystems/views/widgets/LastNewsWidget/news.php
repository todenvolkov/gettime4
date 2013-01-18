<div class="row-fluid emptyrow"></div>
<section class="news">
<div class="row-fluid">
    <div class="span12">

            <h2><span class="bet2">Latest</span><span class="time2"> news</span></h2>
    </div>
</div>
    <div class="row-fluid dottedrow"></div>
        <?php foreach ($news as $new): ?>
        <div class="row-fluid">
            <div class="span2">
                <h3><span class="bet2"<?php echo CHtml::link(Yii::app()->dateFormatter->format('dd-MM-y',$new->date), array('/news/news/show/', 'title' => $new->alias));?></span></h3>
                </div>
            <div class="span10">
                <h3><span class="time2"><?php echo CHtml::link($new->title, array('/news/news/show/', 'title' => $new->alias));?></span></h3>
            </div>
        </div>
            <div class="row-fluid">
                <div class="span12">
                    <?=$new->short_text?>
                </div>
            </div>
    <div class="row-fluid dottedrow"></div>
        <?php endforeach;?>

</section>
