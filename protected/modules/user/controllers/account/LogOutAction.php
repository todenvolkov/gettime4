<?php
class LogOutAction extends CAction
{
    public $layout='//layouts/newspage';


    public function run()
    {
        $this->controller->layout=$this->layout;
        Yii::log(Yii::t('user', 'User {user} logged out!', array('{user}' => Yii::app()->user->getState('nick_name'))), CLogger::LEVEL_INFO, UserModule::$logCategory);
        Yii::app()->user->logout();
        $this->controller->redirect(array(Yii::app()->getModule('user')->logoutSuccess));
    }
}