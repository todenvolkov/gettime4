<?php
class RecoveryAction extends CAction
{
    public $layout='//layouts/newspage';
    public function run()
    {
        $this->controller->layout=$this->layout;
        $form = new RecoveryForm;

        if (Yii::app()->request->isPostRequest && isset($_POST['RecoveryForm']))
        {
            $form->setAttributes($_POST['RecoveryForm']);

            if ($form->validate())
            {         
                $user = $form->getUser();

                // если пароль должен быть сгенерирован автоматически
                if (Yii::app()->getModule('user')->autoRecoveryPassword)
                {
                    $recovery = new RecoveryPassword;

                    $recovery->setAttributes(array(
                                                  'user_id' => $user->id,
                                                  'code' => $recovery->generateRecoveryCode($user->id)
                                             ));

                    if ($recovery->save())
                    {
                        // отправить письмо с сылкой на сброс пароля
                        Yii::log(Yii::t('user', 'Ticket for password recover.'), CLogger::LEVEL_INFO, UserModule::$logCategory);
                        Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'We have sent you instuction on how to recover your password!'));
                        $emailBody = $this->controller->renderPartial('passwordAutoRecoveryEmail', array('model' => $recovery), true);
                        Yii::app()->mail->send(Yii::app()->getModule('user')->notifyEmailFrom, $user->email, Yii::t('user', 'Password recovery!'), $emailBody);
                        $this->controller->redirect(array('/user/account/login'));
                    }
                    else
                    {                        
                        Yii::log(Yii::t('user', 'Error when trying to recover password'), CLogger::LEVEL_ERROR, UserModule::$logCategory);
                        Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Error when trying to recover password! Try again later!!!'));
                        $this->controller->redirect(array('/user/account/recovery'));
                    }
                }
                else
                {
                    $recovery = new RecoveryPassword;

                    $recovery->setAttributes(array(
                                                  'user_id' => $user->id,
                                                  'code' => $recovery->generateRecoveryCode($user->id)
                                             ));

                    if ($recovery->save())
                    {
                        Yii::log(Yii::t('user', 'Ticket for password recover.'), CLogger::LEVEL_INFO, UserModule::$logCategory);
                        Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'We have sent you instuction on how to recover your password!'));
                        // отправить email уведомление
                        $emailBody = $this->controller->renderPartial('passwordRecoveryEmail', array('model' => $recovery), true);
                        Yii::app()->mail->send(Yii::app()->getModule('user')->notifyEmailFrom, $user->email, Yii::t('user', 'Password recovery!'), $emailBody);
                        $this->controller->redirect(array('/user/account/recovery'));
                    }
                    else
                    {
                        Yii::app()->user->setFlash(YFlashMessages::ERROR_MESSAGE, Yii::t('user', 'Error when trying to recover password! Try again later!!!'));
                        Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, UserModule::$logCategory);
                        $this->controller->redirect(array('/user/account/recovery'));
                    }
                }
                
            }
        }

        $this->controller->render('recovery', array('model' => $form));
    }
}