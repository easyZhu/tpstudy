<?php
//设置时区
date_default_timezone_set('PRC');

//加载自动加载文件
require(APP_PATH. 'vendor/autoload.php');

// 加载配置文件
$config = require( APP_PATH. 'config/config.php');
$db = require( APP_PATH. 'config/database.php');

//注册异常类
if ($config['debug']==true) {
    $whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
    ini_set('display_error', 'on');
} else {
    ini_set('display_error', 'off');
}

//载入助手函数
require( APP_PATH. 'tpstudy/help.php');

// 加载核心框架文件
require( APP_PATH. 'tpstudy/tpstudy.php');

// 启动核心框架类
(new tpstudy\Tpstudy($config,$db))->run();