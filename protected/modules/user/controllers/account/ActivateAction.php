<?php
class ActivateAction extends CAction
{
    public $layout='//layouts/newspage';
    public function run($key)
    {
        $this->controller->layout=$this->layout;
        // пытаемся сделать выборку из таблицы пользователей
        $user = User::model()->notActivated()->find('activate_key = :activate_key', array(':activate_key' => $key));

        if (!$user)
        {
            Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Activation error! Probable, this account was already activated. Try register again.'));
            $this->controller->redirect(array(Yii::app()->getModule('user')->accountActivationFailure));
        }

        // процедура активации

        // проверить параметры пользователя по "черным спискам"
        if (!Yii::app()->getModule('user')->isAllowedIp(Yii::app()->request->userHostAddress))
        {
            // перенаправить на экшн для фиксации невалидных ip адресов
            $this->controller->redirect(array(Yii::app()->getModule('user')->invalidIpAction));
        }

        // проверить на email
        if (!Yii::app()->getModule('user')->isAllowedEmail($user->email))
        {
            // перенаправить на экшн для фиксации невалидных ip адресов
            $this->controller->redirect(array(Yii::app()->getModule('user')->invalidEmailAction));
        }


        if($user->activate())
        {
            Yii::log(Yii::t('user', "Account activated with activate_key = {activate_key}!", array('{activate_key}' => $key)), CLogger::LEVEL_INFO, UserModule::$logCategory);

            Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'You have successfully activated account! Now you can sign in!'));

                // отправить сообщение о активации аккаунта
            $emailBody = $this->controller->renderPartial('accountActivatedEmail', array('model' => $user), true);

            Yii::app()->mail->send(Yii::app()->getModule('user')->notifyEmailFrom, $user->email, Yii::t('user', 'Activated!'), $emailBody);

            $this->controller->redirect(array(Yii::app()->getModule('user')->accountActivationSuccess));                
        }
        else
        {
            Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Activation error! Try again later!'));

            Yii::log(Yii::t('user', "Account activated with activate_key => {activate_key} has errors: {error}!", array('{activate_key}' => $key, '{error}' => $e->getMessage())), CLogger::LEVEL_ERROR, UserModule::$logCategory);

            $this->controller->redirect(array(Yii::app()->getModule('user')->accountActivationFailure));            
        }        
    }
}