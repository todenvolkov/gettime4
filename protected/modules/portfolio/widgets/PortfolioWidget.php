<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisvolkov
 * Date: 18.05.12
 * Time: 1:27
 * To change this template use File | Settings | File Templates.
 */
class PortfolioWidget extends YWidget{
    public function init()
                {
                    parent::init();


                }

                public function run()
                {
                        $view = $this->view ? $this->view : 'portfoliowidget';

                        $portfolio=Portfolio::model()->findAll(array('order'=>'year'));
                        $this->render($view, array(

                                                 'portfolio' => $portfolio,
                                             ));

                }
}
?>

