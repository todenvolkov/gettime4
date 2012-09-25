<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisvolkov
 * Date: 18.05.12
 * Time: 1:27
 * To change this template use File | Settings | File Templates.
 */
class TipsArchive extends YWidget{
    public $view;

    public function init()
    {
        parent::init();


    }

    public function run()
    {
        $s=date('D-m-Y-H-i');
        $cacheName = "TipsArchive{$s}";
        $output = Yii::app()->cache->get($cacheName);
        $view = $this->view ? $this->view : 'tipsarchive';

        if ($output === false)
        {

            $tips=Tips::model()->lastArchived()->findAll();
            $output=$tips;
            Yii::app()->cache->set($cacheName, $output);
        }

        $this->render($view, array('tips' => $output,));

    }
}
?>

