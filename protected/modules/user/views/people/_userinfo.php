<section id='userinfo_about'>
    <h2>Personal</h2>
    <dl>
    	<dt>Gender:</dt>
    	<dd><?=$user->getGender();?></dd>
    <?php if($user->birth_date != '0000-00-00') { ?>
    	<dt>Birth date:</dt>
    	<dd><?=CHtml::encode($user->birth_date);?></dd>
    <?php } ?> 
    <?php if($user->about) { ?>
    	<dt>About me:</dt>
    	<dd><?=CHtml::encode($user->about);?></dd>
    <?php } ?> 
    </dl>

</section>