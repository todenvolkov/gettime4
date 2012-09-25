<?php foreach($tips as $tip):?>
<tr>
    <td><span class="s"><?=Yii::app()->dateFormatter->format('dd.MM.yy',$tip['untillDate'])?></span></td>
     <td>   <span class="s"><?=Yii::app()->dateFormatter->format('HH:mm',$tip['untillTime'])?></span>
    </td>
    <td><span class="s"><?=$tip['gamename']?></span></td>
    <td><span class="s"><?=$tip['stavka']?></span></td>

    <td><span class="s"><?=Yii::app()->numberFormatter->format('#.00',$tip['ratio'])?></span></td>
    <td><span class="s"><?=$tip['finalscore']?></span></td>
    <?php if (mb_strtoupper($tip['victory'])==mb_strtoupper('post')) { $tip['victory']='POSTP'; $style='btn-success';} ?>
     <?php if (mb_strtoupper($tip['victory'])==mb_strtoupper('win')) $style='btn-success';
    else if (mb_strtoupper($tip['victory'])==mb_strtoupper('draw')) $style='btn-warning';
    else if (mb_strtoupper($tip['victory'])==mb_strtoupper('lose')) $style='btn-danger';
    else if (mb_strtoupper($tip['victory'])==mb_strtoupper('POSTP')) $style='btn-success';
    ?>
    <td><a href="#" class="btn <?=$style?>"><?=mb_strtoupper($tip['victory'])?></a></td>
    </tr>
<?endforeach;?>
