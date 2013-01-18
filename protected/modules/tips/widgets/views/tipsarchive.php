<?php foreach($tips as $tip):?>
<tr>
    <td><span class="s"><?=Yii::app()->dateFormatter->format('dd.MM.yy',$tip['untillDate'])?></span></td>
     <td>   <span class="s"><?=Yii::app()->dateFormatter->format('HH:mm',$tip['untillTime'])?></span>
    </td>
    <td><span class="s"><?=$tip['gamename']?></span></td>
    <td><span class="s"><?=$tip['stavka']?></span></td>

    <td><span class="s"><?=Yii::app()->numberFormatter->format('#.00',$tip['ratio'])?></span></td>
    <td><span class="s"><?=$tip['finalscore']?></span></td>
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
<?endforeach;?>
