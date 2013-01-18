<?php
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
date_default_timezone_set('Europe/Moscow');
$yii = dirname(__FILE__) . '/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
defined('BETTIME_PRODUCTION') or define('BETTIME_PRODUCTION', true);
require_once($yii);
date_default_timezone_set('Europe/London');
Yii::createWebApplication($config)->run();

