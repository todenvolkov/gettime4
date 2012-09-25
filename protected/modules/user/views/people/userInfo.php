<?php
    $this->pageTitle = CHtml::encode($user->nick_name);
    $this->breadcrumbs = array(
        Yii::t('user', 'Users') => array('people/'),
        CHtml::encode($user->nick_name),
    );
?>

<?php //:KLUDGE: Определение дефолтного аватара желательно внести в User::getAvatar ?>
<?php ($avatar = $user->getAvatar( 100 )) || ($avatar = CHtml::image( Yii::app()->theme->baseUrl."/images/default_avatar_100.png", '' )); ?>

<section id="people_userinfo">
	<?=$avatar?>
	<h1><?=CHtml::encode($user->nick_name)?></h1>
	<div class="fio"><?=CHtml::encode($user->fullName)?></div>

	<div class="rate">Rating: &infin; &nbsp; power: &infin;</div>
</section>

<?php
	$topicsNum = 0;
	$commentsNum = 0;
	$menu = array(
		array(
            'label' => Yii::t('people','About user'),
            'url' => array(
                'people/userInfo',
                'username' => $user->nick_name,
                'mode' => null
            ),
            'active' => !$mode
        ), array(
            'label' => $topicsNum
                ? Yii::t('people','Favorite topics ({num})', array('num' => $topicsNum))
                : Yii::t('people','Favorite topics'),
            'url' => array(
                'people/userInfo',
                'username' => $user->nick_name,
                'mode' => 'topics'
            ),
            'active' => $mode=="topics"
        ), array(
            'label' => $commentsNum
                ? Yii::t('people','Favorite comments ({num})', array('num' => $commentsNum))
                : Yii::t('people','Favorite comments'),
            'url' => array(
                'people/userInfo',
                'username' => $user->nick_name,
                'mode' => 'comments'
            ),
            'active' => $mode=="comments"
        ),
	);

	$this->widget('zii.widgets.CMenu', array(
		'items' => $menu,
		'htmlOptions' => array('class' => 'bluemenu'),
	));

	$this->renderPartial("_userinfo".ucfirst($mode), array('user' => $user));