<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',

    'defaultController' => 'site',

    'name' => 'BetTime.Info',

    'language' => 'en',

    'theme' => 'nsystems',

    'preload' => array('log','bootstrap'),


    'import' => array(
        'application.components.*',
      'ext.shoppingCart.*',
        'ext.KEmail.KEmail',

      //  'application.components.shoppingCart.*',

        'application.modules.user.UserModule',
        'application.modules.user.models.*',
        'application.modules.user.forms.*',
        'application.modules.user.components.*',

        'application.modules.page.models.*',

        'application.modules.news.models.*',
        'application.modules.contentblock.models.*',
        'application.modules.comment.models.*',
        'application.modules.image.models.*',
//        'application.modules.vote.models.*',
        'application.modules.blog.models.*',
        'application.modules.menu.models.*',
        'application.modules.menu.controllers.*',
//        'application.modules.portfolio.models.*',
//        'application.modules.portfolio.controllers.*',
        'application.modules.tips.models.*',
        'application.modules.tips.controllers.*',
        'application.modules.tips.widgets.*',

        'application.modules.order.models.*',
        'application.modules.order.controllers.*',
        'application.modules.order.widgets.*',
        'application.modules.cart.models.*',
        'application.modules.cart.controllers.*',
        'application.modules.cart.widgets.*',

//        'application.modules.portfolio.widgets.*',
//        'application.modules.businesstypes.models.*',
//        'application.modules.businesstypes.controllers.*',
        'application.modules.yupe.controllers.*',
        'application.modules.yupe.widgets.*',
        'application.modules.yupe.helpers.*',
        'application.modules.yupe.models.*',
        'application.modules.yupe.components.*',

//        'application.modules.social.widgets.ysc.*',
//
//        'application.modules.social.components.*',
//        'application.modules.social.models.*',
//        'application.modules.social.extensions.eoauth.*',
//        'application.modules.social.extensions.eoauth.lib.*',
//        'application.modules.social.extensions.lightopenid.*',
//        'application.modules.social.extensions.eauth.services.*',
    ),

    // –Ї–Њ–љ—Д–Є–≥—Г—А–Є—А–Њ–≤–∞–љ–Є–µ –Њ—Б–љ–Њ–≤–љ—Л—Е –Ї–Њ–Љ–њ–Њ–љ–µ–љ—В–Њ–≤ (–њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/basics.component)
    'components' => array(
        'email'=>array(
            'class'=>'KEmail',
            'host_name'=>'s130213.gridserver.com', //Hostname or IP of smtp server
        ),
        'shoppingCart' =>
            array(
                'class' => 'ext.shoppingCart.EShoppingCart',
            ),

        'bootstrap'=>array(
                'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
            ),

        'authManager'=>array(
            'class'=>'RDbAuthManager',
        ),

        // –С–Є–±–ї–Є–Њ—В–µ–Ї–∞ –і–ї—П —А–∞–±–Њ—В—Л —Б –Ї–∞—А—В–Є–љ–Ї–∞–Љ–Є —З–µ—А–µ–Ј GD/ImageMagick
        // –Ы—Г—З—И–µ —Г—Б—В–∞–љ–Њ–≤–Є—В–µ ImageMagick, —В.–Ї. –Њ–љ —А–µ—Б–∞–є–Ј–Є—В –∞–љ–Є–Љ–Є—А–Њ–≤–∞–љ–љ—Л–µ –≥–Є—Д—Л
        'image' => array(
            'class' => 'application.modules.yupe.extensions.image.CImageComponent',
            'driver' => 'GD', // –Х—Й–µ –±—Л–≤–∞–µ—В ImageMagick, –µ—Б–ї–Є –Є—Б–њ–Њ–ї—М–Ј—Г–µ—В—Б—П –Њ–љ, –љ–∞–і–Њ —Г–Ї–∞–Ј–∞—В—М –Ї –љ–µ–Љ—Г –њ—Г—В—М —З—Г—В—М –љ–Є–∂–µ
            'params' => array('directory' => '/usr/bin'), // –Т —Н—В–Њ–є –і–Є—А–µ–Ї—В–Њ—А–Є–Є –і–Њ–ї–∂–µ–љ –±—Л—В—М convert
        ),

        // –њ–Њ–і–Ї–ї—О—З–µ–љ–Є–µ –±–Є–±–ї–Є–Њ—В–µ–Ї–Є –і–ї—П –∞–≤—В–Њ—А–Є–Ј–∞—Ж–Є–Є —З–µ—А–µ–Ј —Б–Њ—Ж–Є–∞–ї—М–љ—Л–µ —Б–µ—А–≤–Є—Б—Л, –њ–Њ–і—А–Њ–±–љ–µ–µ https://github.com/Nodge/yii-eauth
        'loid' => array(
            'class' => 'application.modules.social.extensions.lightopenid.loid',
        ),

//        // —Н–Ї—Б—В–µ–љ—И–љ –і–ї—П –∞–≤—В–Њ—А–Є–Ј–∞—Ж–Є–Є —З–µ—А–µ–Ј —Б–Њ—Ж–Є–∞–ї—М–љ—Л–µ —Б–µ—В–Є –њ–Њ–і—А–Њ–±–љ–µ–µ http://habrahabr.ru/post/129804/
//        'eauth' => array(
//            'class' => 'application.modules.social.extensions.eauth.EAuth',
//            'popup' => true, // Use the popup window instead of redirecting.
//            'services' => array( // You can change the providers and their classes.
//                'google' => array(
//                  'class' => 'CustomGoogleService',
//                ),
//                'yandex' => array(
//                   'class' => 'CustomYandexService',
//                ),
//            ),
//        ),

        // –Ї–Њ–Љ–њ–Њ–љ–µ–љ—В –і–ї—П –Њ—В–њ—А–∞–≤–Ї–Є –њ–Њ—З—В—Л
        'mail' => array(
            'class' => 'application.modules.yupe.components.YMail',
        ),

        // –Ї–Њ–љ—Д–Є–≥—Г—А–Є—А–Њ–≤–∞–љ–Є–µ urlManager, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/topics.url
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => true,
            'cacheID' => 'cache',
            'rules' => array(
		        '/' => 'site/index',
                '/login' => 'user/account/login',
                '/logout' => 'user/account/logout',

                '/pages/<slug>' => 'page/page/show',
                '/story/<title>' => 'news/news/show/',
                '/post/<slug>.html' => 'blog/post/show/',
                             '/posts/tag/<tag>' => 'blog/post/list/',
                             '/blog/<slug>' => 'blog/blog/show/',
                             '/blogs/' => 'blog/blog/index/',

                '/<slug:service>' => 'page/page/show',
                '/<slug:contacts>' => 'page/page/show',
                '/<slug:home>' => 'page/page/show',
                '/<slug:success>' => 'page/page/show',
                '/<slug:fail>' => 'page/page/show',
                '/records' => 'tips/tips/index',
                '/records/<slug>' => 'tips/tips/show',
                '/buy/<slug>' => 'tips/tips/buy',
                '/saveorder'=>'order/order/process',
                '/paypal/listener' => 'order/order/processpaypal',
                '/okpay/listener' => 'order/order/processokpay',
                '/paypal/checkout' => 'order/order/paypalcheckout',
                '/paypal/confirmation' => 'order/order/paypalconfirmation',
                '/paypal/cancel' => 'order/order/paypalcancel',


                

            ),
        ),

        // –Ї–Њ–љ—Д–Є–≥—Г—А–Є—А—Г–µ–Љ –Ї–Њ–Љ–њ–Њ–љ–µ–љ—В CHttpRequest –і–ї—П –Ј–∞—Й–Є—В—Л –Њ—В CSRF –∞—В–∞–Ї, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/topics.security
        // –†–Х–Ъ–Ю–Ь–Х–Э–Ф–£–Х–Ь –£–Ъ–Р–Ч–Р–¢–ђ –°–Т–Ю–Х –Ч–Э–Р–І–Х–Э–Ш–Х –Ф–Ы–ѓ –Я–Р–†–Р–Ь–Х–¢–†–Р "csrfTokenName"
        'request' => array(
            'class' => 'CHttpRequest',
            'enableCsrfValidation' => false,
            'csrfTokenName' => 'YUPE_TOKEN',
        ),

        // –њ–Њ–і–Ї–ї—О—З–µ–љ–Є–µ –Ї–Њ–Љ–њ–Њ–љ–µ–љ—В–∞ –і–ї—П –≥–µ–љ–µ—А–∞—Ж–Є–Є ajax-–Њ—В–≤–µ—В–Њ–≤
        'ajax' => array(
            'class' => 'application.modules.yupe.components.YAsyncResponse',
        ),

        // –Ї–Њ–Љ–њ–Њ–љ–µ–љ—В Yii::app()->user, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/topics.auth
        'user' => array(
            'class' => 'application.modules.user.components.YWebUser',
            'loginUrl' => '/user/account/login/'
        ),

         // –њ–∞—А–∞–Љ–µ—В—А—Л –њ–Њ–і–Ї–ї—О—З–µ–љ–Є—П –Ї –±–∞–Ј–µ –і–∞–љ–љ—Л—Е, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/database.overview
        'db' => require(dirname(__FILE__) . '/db.php'),

        // –љ–∞—Б—В—А–Њ–є–Ї–Є –Ї—Н—И–Є—А–Њ–≤–∞–љ–Є—П, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/caching.overview
        'cache' => array(
            'class' => 'CDummyCache',
        ),

        // –њ–∞—А–∞–Љ–µ—В—А—Л –ї–Њ–≥–Є—А–Њ–≤–∞–љ–Є—П, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/topics.logging
       'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, info',
                    'filter'=> array(
                                   'class' => 'CLogFilter',
                                   'prefixSession'=> true,
                                   'prefixUser'=> true,
                                   'logUser'=> true,
                                   // по умолчанию
                                   // '_GET','_POST','_FILES',
                                   // '_COOKIE','_SESSION','_SERVER'
                                   'logVars' => array('_GET','_POST','_COOKIE'),
                                ),
                ),
                //–њ—А–Њ—Д–∞–є–ї–µ—А –Ј–∞–њ—А–Њ—Б–Њ–≤ –Ї –±–∞–Ј–µ –і–∞–љ–љ—Л—Е, –љ–∞ –њ—А–Њ–і–∞–Ї—И–љ —Б–µ—А–≤–µ—А–∞—Е —А–µ–Ї–Њ–Љ–µ–љ–і—Г–µ—В—Б—П –Њ—В–Ї–ї—О—З–Є—В—М
                array(
                    'class'=>'application.modules.yupe.extensions.db_profiler.DbProfileLogRoute',
                    'countLimit' => 1, // How many times the same query should be executed to be considered inefficient
                    'slowQueryMin' => 0.01, // Minimum time for the query to be slow
                ),
            ),
        ),
    ),

    // –Ї–Њ–љ—Д–Є–≥—Г—А–∞—Ж–Є—П –Љ–Њ–і—Г–ї–µ–є –њ—А–Є–ї–Њ–∂–µ–љ–Є—П, –њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.ru/doc/guide/ru/basics.module
    'modules' => array(
        'menu' => array(
             'class' => 'application.modules.menu.MenuModule',
         ),
        'blog' => array(
            'class' => 'application.modules.blog.BlogModule',
        ),
//        'social' => array(
//            'class' => 'application.modules.social.SocialModule',
//        ),
        'comment' => array(
            'class' => 'application.modules.comment.CommentModule',
        ),
//        'dictionary' => array(
//            'class' => 'application.modules.dictionary.DictionaryModule',
//        ),
//        'gallery' => array(
//            'class' => 'application.modules.gallery.GalleryModule',
//        ),
//        'vote' => array(
//            'class' => 'application.modules.vote.VoteModule',
//        ),
//        'contest' => array(
//            'class' => 'application.modules.contest.ContestModule',
//        ),
        'image' => array(
            'class' => 'application.modules.image.ImageModule',
        ),
        'yupe' => array(
            'class' => 'application.modules.yupe.YupeModule',
            'brandUrl' => 'http://yupe.ru?from=engine',
        ),
//        'install' => array(
//            'class' => 'application.modules.install.InstallModule',
//        ),
        'category' => array(
            'class' => 'application.modules.category.CategoryModule',
        ),
        'news' => array(
            'class' => 'application.modules.news.NewsModule',
        ),
//        'portfolio' => array(
//                    'class' => 'application.modules.portfolio.PortfolioModule',
//                ),
        'tips' => array(
                            'class' => 'application.modules.tips.TipsModule',
                        ),
        'order' => array(
                            'class' => 'application.modules.order.OrderModule',
                        ),
//        'businesstypes' => array(
//                    'class' => 'application.modules.businesstypes.BusinessTypesModule',
//                ),
        'user' => array(
            'class' => 'application.modules.user.UserModule',
            'documentRoot' => $_SERVER['DOCUMENT_ROOT'],
            'avatarsDir' => '/yupe/avatars',
            'avatarExtensions' => array('jpg', 'png', 'gif'),
            'notifyEmailFrom' => 'info@bettime.info',
            'urlRules' => array(
              'user/people/<username:\w+>/<mode:(topics|comments)>' => 'user/people/userInfo',
              'user/people/<username:\w+>' => 'user/people/userInfo',
              'user/people/' => 'user/people/index',

            ),
        ),
        'page' => array(
            'class' => 'application.modules.page.PageModule',
            'layout' => 'application.views.layouts.column2',

        ),
        'contentblock' => array(
            'class' => 'application.modules.contentblock.ContentBlockModule',
        ),
        'feedback' => array(
            'class' => 'application.modules.feedback.FeedbackModule',
            'types' => array(
                1 => '–Ю—И–Є–±–Ї–∞ –љ–∞ —Б–∞–є—В–µ',
                2 => '–Я—А–µ–і–ї–Њ–∂–µ–љ–Є–µ –Њ —Б–Њ—В—А—Г–і–љ–Є—З–µ—Б—В–≤–µ',
                3 => '–Я—А–Њ—З–µ–µ..',
            ),
            'notifyEmailFrom' => 'test@test.ru',
            'backEnd' => array('email', 'db'),
            'emails'  => 'test_1@test.ru, test_2@test.ru',
        ),
        // –њ–Њ–і–Ї–ї—О—З–µ–љ–Є–µ gii –≤ —А–µ–∂–Є–Љ–µ –±–Њ–µ–≤–Њ–є —А–∞–±–Њ—В—Л —А–µ–Ї–Њ–Љ–µ–љ–і—Г–µ—В—Б—П –Њ—В–Ї–ї—О—З–Є—В—М (–њ–Њ–і—А–Њ–±–љ–µ–µ http://www.yiiframework.com/doc/guide/1.1/en/quickstart.first-app)
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gbp13ltw',
            'generatorPaths'=>array(
                        'bootstrap.gii', // since 0.9.1
                    ),
        ),
    ),

    'behaviors' => array('YupeStartUpBehavior'),
);