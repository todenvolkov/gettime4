<?php 
class LoginAction extends CAction
{
    public $layout='//layouts/newspage';

    public function run()
    {
        $form = new LoginForm;

        if (Yii::app()->request->isPostRequest && !empty($_POST['LoginForm']))
        {
            $form->setAttributes($_POST['LoginForm']);

            if ($form->validate())
            {
                Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'You are logged in!'));

                Yii::log(Yii::t('user', 'User {email} authorized!', array('{email}' => $form->email)), CLogger::LEVEL_INFO, UserModule::$logCategory);

                $module = Yii::app()->getModule('user');

                $redirect = (Yii::app()->user->isSuperUser() && $module->loginAdminSuccess) ? array($module->loginAdminSuccess) : array($module->loginSuccess);

                $this->controller->redirect($redirect);
            }
            else
                Yii::log(Yii::t('user', 'Authorization error! email => {email}, Password => {password}!', array('{email}' => $form->email, '{password}' => $form->password)), CLogger::LEVEL_ERROR, UserModule::$logCategory);
        }
        $this->controller->layout=$this->layout;
        $this->controller->render('login', array('model' => $form));
    }
}