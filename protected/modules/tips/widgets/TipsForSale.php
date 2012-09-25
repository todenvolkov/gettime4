<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisvolkov
 * Date: 18.05.12
 * Time: 1:27
 * To change this template use File | Settings | File Templates.
 */
class TipsForSale extends YWidget{
    public $view;

    public function init()
    {
        parent::init();


    }

    public function run()
    {
        $s=date('D-m-Y-H-i');
        $cacheName = "TipsForSale{$s}";
        $output = Yii::app()->cache->get($cacheName);
        //$output=false;
        $view = $this->view ? $this->view : 'tipsforsaleview';

        if ($output === false)
        {
            $tips=Tips::model()->forsale()->findAll();
            $output=$tips;
            Yii::app()->cache->set($cacheName, $output);
        }

            $this->render($view, array(

                                     'tips' => $output,
                                 ));

    }
}
?>

