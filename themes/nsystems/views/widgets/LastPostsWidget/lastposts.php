<div class='portlet'>

    <div class='portlet-content'>
        <ul>
            <?php foreach ($posts as $post): ?>
<!--            <li>--><?php //echo CHtml::link($post->title, array('/blog/post/show/', 'slug' => $post->slug));?><!--</li>-->
                 <li> <?=Yii::app()->dateFormatter->format('dd.MM.yyyy',$post->publish_date)?> <?=$post->content;?> </li>

            <?php endforeach;?>
        </ul>
    </div>
</div><p>&nbsp;</p>
    <P>
<a href="http://bettime.info/blog/free-betting-tips">Free tips archive>></a></P>
        <p>&nbsp;</p>