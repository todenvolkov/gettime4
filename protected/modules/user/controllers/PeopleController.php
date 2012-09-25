<?php
class PeopleController extends YFrontController
{
    public $layout='//layouts/newspage';
    // Вывод публичной страницы всех пользователей
    public function actionIndex()
    {

        $dataProvider = new CActiveDataProvider('User', array(
             'criteria' => array(
                 'condition' => 'status = :status',
                 'params' => array(':status' => User::STATUS_ACTIVE),
                 'order' => 'last_visit DESC'
             )
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider
        ));
    }

    // Вывод публичной страницы пользователя
    public function actionUserInfo($username=null, $mode=null)
    {
        $user = $username
            ? User::model()->findByAttributes(array("nick_name" => $username))
            : Yii::app()->user;

    	if ( !$user )
			throw new CHttpException(404, Yii::t('people', 'User not found'));

    	$this->render('userInfo', array(
    	   'user' => $user,
    	   'mode' => $mode
        ));
    }
}