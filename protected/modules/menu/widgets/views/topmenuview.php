
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
        <ul class="nav">
            <?php foreach ($output as $new): ?>
                <li><a href="<?=$new->href?>"><span><?=$new->title?></span></a></li>
            <li class="divider-vertical"></li>
            <?php endforeach;?>
        </ul>
        </div>
    </div>
</div>