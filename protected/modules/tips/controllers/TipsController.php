<?php

class TipsController extends YFrontController
{
    public $CurrentTip='';
    public $layout="//layouts/newspage";

public function actionIndex()
{

    $tips=Tips::model()->allArchived()->findAll();
    if (count($tips)<=0)
    {
        $this->render('nomoretips');
    }
    else
    {
	    $this->render('tips',array('tips'=>$tips));
    }
}

public function actionShow()
{
    $slug = Yii::app()->request->getQuery('slug');

    if (!$slug)
        throw new CHttpException('404', Yii::t('page', 'Page not found!'));

    $tips = null;
    if (($slug)>10) //why 10 - x3
    {
        //must be mmyyyy
        $month=substr($slug,0,2);
        $year=substr($slug,2,4);
        $criteria=new CDbCriteria;
        //$criteria->select=’title’;  // only select the ’title’ column
        $criteria->condition='month(untillDate)=:month and year(untillDate)=:year';
        $criteria->params=array(':month'=>$month,':year'=>$year);
        $tips=Tips::model()->allArchived()->findAll($criteria);


    }

    $this->render('tipsbymonth',array('tips'=>$tips));
}

public function actionBuy()
{

    $this->layout="//layouts/newspage";

    $slug = Yii::app()->request->getQuery('slug');
    if (!$slug)
            throw new CHttpException('404', Yii::t('tips', 'Tip not found!'));

    $tip = Tips::model()->find('guid = :guid', array(':guid' => $slug));
     if (!$tip)
            throw new CHttpException('404', Yii::t('tip', 'tip not found!'));

    Yii::app()->shoppingCart->update($tip,1); //1 item with id=1, quantity=1.

    $shoppingCart=Yii::app()->shoppingCart->getPositions();
    $total=Yii::app()->shoppingCart->getCost();

    $this->render('buytips', array('tip' => $tip,'shoppingCart'=>$shoppingCart,'total'=>$total));
}


}
