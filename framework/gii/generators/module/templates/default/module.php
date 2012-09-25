<?php echo "<?php\n"; ?>

class <?php echo $this->moduleClass; ?> extends YWebModule
{

           public function getCategory()
           {
               return Yii::t('businesstypes', 'Отрасли');
           }

           public function getNavigation()
           {
               return array(
                   Yii::t('businesstypes', 'Отрасли')=>'/businesstypes/',
               );
           }

           public function getName()
           {
               return Yii::t('businesstypes', 'Отрасли');
           }

           public function getDescription()
           {
               return Yii::t('businesstypes', 'Отрасли');
           }

           public function getVersion()
           {
               return Yii::t('businesstypes', '0.1 (dev)');
           }

           public function getAuthor()
           {
               return Yii::t('portfolio', 'N team');
           }

           public function getAuthorEmail()
           {
               return Yii::t('businesstypes', 'info@neo-systems.ru');
           }

           public function getUrl()
           {
               return Yii::t('businesstypes', 'http://neo-systems.ru');
           }


	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'<?php echo $this->moduleID; ?>.models.*',
			'<?php echo $this->moduleID; ?>.components.*',
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
