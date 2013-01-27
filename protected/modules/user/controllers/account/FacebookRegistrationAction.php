<?php

class FacebookRegistrationAction extends CAction
{
    public $layout='//layouts/login_page_template';
    private $_identity;


     function parse_signed_request($signed_request, $secret) {
      list($encoded_sig, $payload) = explode('.', $signed_request, 2);

      // decode the data
      $sig = $this->base64_url_decode($encoded_sig);
      $data = json_decode($this->base64_url_decode($payload), true);

      if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
        error_log('Unknown algorithm. Expected HMAC-SHA256');
        return null;
      }

      // check sig
      $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
      if ($sig !== $expected_sig) {
        error_log('Bad Signed JSON signature!');
        return null;
      }

      return $data;
    }


    function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }


    public function run()
    {
        define("FACEBOOK_APP_ID","441551729247176");
        define("FACEBOOK_SECRET", "88fe423a10b2f51dd6b840f4a2706489");
        $this->controller->layout=$this->layout;
        $form = new RegistrationForm;

        $module = Yii::app()->getModule('user');
        $response =$this->parse_signed_request($_REQUEST['signed_request'],
                                                       FACEBOOK_SECRET);

        if (Yii::app()->request->isPostRequest && !empty($response))
        {


            // проверка по "черным спискам"
            
            // проверить на email
            if (!$module->isAllowedEmail($response['registration']['email']))
                // перенаправить на экшн для фиксации невалидных email-адресов
                $this->controller->redirect(array($module->invalidEmailAction));

            if (User::getEmailExistsStatus($response['registration']['email']))
            {

                // перенаправить на экшн для фиксации невалидных email-адресов
                Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'Email already exists!'));
                $this->controller->render('registration', array('model' => $form, 'module' => $module));
                return;
            }

            if (!$module->isAllowedIp(Yii::app()->request->userHostAddress))            
                // перенаправить на экшн для фиксации невалидных ip-адресов
                $this->controller->redirect(array($module->invalidIpAction));            


                    // если активации не требуется - сразу создаем аккаунт
                    $user = new User;                    
                    $password=User::generateRandomPassword();


                    $user->createAccount($response['registration']['name'], $response['registration']['email'], $password, null , User::STATUS_ACTIVE, User::EMAIL_CONFIRM_NO,
                             $response['registration']['name'],
                             '',$response['registration']['birthday'],$response['registration']['gender'],$response['registration']['location']['name']);

                    if ($user && !$user->hasErrors())
                    {
                        Yii::log(Yii::t('user', "A new account created: {nick_name} without activation!", array('{nick_name}' => $user->nick_name)), CLogger::LEVEL_INFO, UserModule::$logCategory);

                        // отправить email с сообщением о успешной регистрации
                        $emailBody = $this->controller->renderPartial('accountCreatedEmail', array('model' => $user), true);

                        Yii::app()->mail->send($module->notifyEmailFrom, $user->email, Yii::t('user', 'Registration on {site} !', array('{site}' => Yii::app()->name)), $emailBody);

                        Yii::app()->user->setFlash(YFlashMessages::NOTICE_MESSAGE, Yii::t('user', 'Account created, please Sign in now!'));

                        $this->_identity = new UserIdentity($response['registration']['email'], $password);
//  LOGIN NOW! WHY WAIT AGAIN FOR INPUT?
                                   if (!$this->_identity->authenticate())
                                       $this->addError('password', Yii::t('user', 'Email or password is incorrect!'));
                                   else
                                       Yii::app()->user->login($this->_identity);

                        $this->controller->redirect(array($module->loginSuccess));
                    }
                    else
                    {
                        $form->addErrors($user->getErrors());

                        Yii::log(Yii::t('user', "Error while creating site without registration!"), CLogger::LEVEL_ERROR, UserModule::$logCategory);
                    }                                       
                }


        $this->controller->render('registration', array('model' => $form, 'module' => $module));
    }
}