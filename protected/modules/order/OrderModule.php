<?php

class OrderModule extends YWebModule
{
    //public $editor = 'application.modules.yupe.widgets.editors.imperaviRedactor.EImperaviRedactorWidget';

    public $price_for_1_tip, $price_for_2_tips, $price_for_3_tips, $price_subscription;

    public function getParamsLabels()
    {
        return array(
            'adminMenuOrder' => Yii::t('order','Порядок следования в меню'),
            'price_for_1_tip'=> Yii::t('order','Цена 1 ставки'),
                        'price_for_2_tips'=> Yii::t('order','Цена 2 ставок'),
                        'price_for_3_tips'=> Yii::t('order','Цена 3 ставок'),
                        'price_subscription'=> Yii::t('order','Цена подписки'),

       //     'editor'         => Yii::t('order','Визуальный редактор')
        );
    }

    public function  getVersion()
    {
        return '0.2';
    }

    public function getEditableParams()
    {
        return array(
            'adminMenuOrder',//,
            //'editor' => Yii::app()->getModule('yupe')->getEditors()
            'price_for_1_tip',
            'price_for_2_tips',
            'price_for_3_tips' ,
            'price_subscription',
        );
    }

    public function getCategory()
    {
        return Yii::t('order', 'Контент');
    }

    public function getName()
    {
        return Yii::t('order', 'Заказы');
    }

    public function getDescription()
    {
        return Yii::t('order', 'Модуль для создания и редактирования заказов');
    }

    public function getAuthor()
    {
        return Yii::t('order', 'yupe team');
    }

    public function getAuthorEmail()
    {
        return Yii::t('order', 'team@yupe.ru');
    }

    public function getUrl()
    {
        return Yii::t('order', 'http://yupe.ru');
    }

    public function init()
    {
        parent::init();

        $this->setImport(array(
                              'application.modules.order.models.*',
                              'application.modules.order.components.*',
                              'application.modules.order.components.widgets.*',
                         ));

        // Если у модуля не задан редактор - спросим у ядра

    }
}