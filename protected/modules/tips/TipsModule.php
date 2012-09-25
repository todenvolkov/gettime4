<?php

class TipsModule extends YWebModule
{
    public function getCategory()
            {
                return Yii::t('tips', 'Прогнозы');
            }

            public function getNavigation()
            {
                return array(
                    Yii::t('tips', 'Прогнозы')=>'/tips/',
                );
            }

            public function getName()
            {
                return Yii::t('tips', 'Прогнозы');
            }

            public function getDescription()
            {
                return Yii::t('tips', 'Прогнозы');
            }

            public function getVersion()
            {
                return Yii::t('tips', '0.1 (dev)');
            }

            public function getAuthor()
            {
                return Yii::t('tips', 'N team');
            }

            public function getAuthorEmail()
            {
                return Yii::t('tips', 'info@neo-systems.ru');
            }

            public function getUrl()
            {
                return Yii::t('tips', 'http://neo-systems.ru');
            }

            public function init()
            {
                parent::init();
                $this->setImport(array(
                    'tips.models.*',
                    'tips.components.*',
                ));
            }


    	public function beforeControllerAction($controller, $action)
    	{
    		if(parent::beforeControllerAction($controller, $action))
    		{
    			// this method is called before any module controller action is performed
    			// you may place customized code here
    			return true;
    		}
    		else
    			return false;
    	}
}
