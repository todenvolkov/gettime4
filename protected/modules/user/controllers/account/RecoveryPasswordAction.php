<?php
class RecoveryPasswordAction extends CAction
{
    //сброс пароля
    public $layout='//layouts/newspage';
    public function run($code)
    {
        $this->controller->layout=$this->layout;
        $recovery = RecoveryPassword::model()->with('user')->find('code = :code', array(':code' => $code));

        if (!$recovery)
        {
            Yii::log(Yii::t('user', 'Recovery code {code} not found!', array('{code}' => $code)), CLogger::LEVEL_ERROR, UserModule::$logCategory);
            Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Recovery code not found! Try again later'));
            $this->controller->redirect(array('/user/account/recovery'));
        }

        // автоматическое восстановление пароля
        if (Yii::app()->getModule('user')->autoRecoveryPassword)
        {
            $newPassword = User::model()->generateRandomPassword();
            $recovery->user->password = User::model()->hashPassword($newPassword, $recovery->user->salt);
            $transaction = Yii::app()->db->beginTransaction();
            try
            {
                if ($recovery->user->save() && RecoveryPassword::model()->deleteAll('user_id = :user_id', array(':user_id' => $recovery->user->id)))
                {
                    $transaction->commit();
                    $emailBody = $this->controller->renderPartial('passwordAutoRecoverySuccessEmail', array('model' => $recovery->user, 'password' => $newPassword), true);
                    Yii::app()->mail->send(Yii::app()->getModule('user')->notifyEmailFrom, $recovery->user->email, Yii::t('user', 'Successfull password recovery!'), $emailBody);
                    Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'New password is emailed to you!'));
                    Yii::log(Yii::t('user', 'Successfull password recovery!'), CLogger::LEVEL_ERROR, UserModule::$logCategory);
                    $this->controller->redirect(array('/user/account/login'));
                }
            }
            catch (CDbException $e)
            {
                $transaction->rollback();
                Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Error when changing password!'));
                Yii::log(Yii::t('user', 'Error while changing password {error}!', array('{error}' => $e->getMessage())), CLogger::LEVEL_ERROR, UserModule::$logCategory);
                $this->controller->redirect(array('/user/account/recovery'));
            }
        }

        // выбор своего пароля
        $changePasswordForm = new ChangePasswordForm;

        // если отправили фому с новым паролем
        if (Yii::app()->request->isPostRequest && !empty($_POST['ChangePasswordForm']))
        {
            $changePasswordForm->setAttributes($_POST['ChangePasswordForm']);

            if ($changePasswordForm->validate())
            {
                $transaction = Yii::app()->db->beginTransaction();

                try
                {
                    // смена пароля пользователя                
                    $recovery->user->password = User::model()->hashPassword($changePasswordForm->password, $recovery->user->salt);

                    // удалить все запросы на восстановление для данного пользователя                       
                    if ($recovery->user->save() && RecoveryPassword::model()->deleteAll('user_id = :user_id', array(':user_id' => $recovery->user->id)))
                    {
                        $transaction->commit();
                        Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'Password changed!'));
                        Yii::log(Yii::t('user', 'Password changed for user: {user}!', array('{user}' => $recovery->user->id)), CLogger::LEVEL_INFO, UserModule::$logCategory);
                        $emailBody = $this->controller->renderPartial('passwordRecoverySuccessEmail', array('model' => $recovery->user), true);
                        Yii::app()->mail->send(Yii::app()->getModule('user')->notifyEmailFrom, $recovery->user->email, Yii::t('user', 'Successfull password recovery'), $emailBody);
                        $this->controller->redirect(array('/user/account/login'));
                    }
                }
                catch (CDbException $e)
                {
                    $transaction->rollback();
                    Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Error while changing password!'));
                    Yii::log(Yii::t('Error while changing password {error}!', array('{error}' => $e->getMessage())), CLogger::LEVEL_ERROR, UserModule::$logCategory);
                    $this->controller->redirect(array('/user/account/recovery'));
                }
            }
        }

        $this->controller->render('changePassword', array('model' => $changePasswordForm));
    }
}