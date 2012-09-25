<?php
class TopMenuWidget extends YWidget
{
    public $code;
    public $silent = false;

    public function init()
    {
//        if (!$this->code)
//            throw new CException(Yii::t('contentblock', 'Укажите название контент блока для ContentBlockWidget !'));
    }

    public function run()
    {
        $cacheName = "TopMenuBlock{$this->id}";
        $output = Yii::app()->cache->get($cacheName);

        if ($output === false)
        {
            $menuItems = MenuItem::model()->FirstLevelOfTopMenu()->findAll();

            foreach ($menuItems as &$item)
            {
                $item->getRelated('children',true);  // Второй уровень

                if ($item->hasRelated('children'))
                {
                    $b=$item->children;
                    foreach ($b as &$subitem)
                    {
                        $subitem->getRelated('children',true); // Третий уровень
                    }
                }

            }

            $output=$menuItems;
            Yii::app()->cache->set($cacheName, $output);
        }

        $this->render('topmenuview', array(
            'output' => $output
        ));
    }
}