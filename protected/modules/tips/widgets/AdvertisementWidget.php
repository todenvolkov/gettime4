<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisvolkov
 * Date: 18.05.12
 * Time: 1:27
 * To change this template use File | Settings | File Templates.
 */
class AdvertisementWidget extends YWidget{
    public $view;
    public $total;

    public function init()
    {
        parent::init();


    }

    public function run()
    {
        $cacheName = "AdvertisementWindget{$this->id}";
        $output = Yii::app()->cache->get($cacheName);
        $view = $this->view ? $this->view : 'adv';

        if ($output === false)
        {
            $tips=$this->total;
            $output=$tips;
            Yii::app()->cache->set($cacheName, $output);
        }

            $this->render($view, array(

                                     'total' => $output,
                                 ));

    }
}
?>

