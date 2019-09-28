<?php
/**
 * workerman/GlobalData组件
 * 作用：《实现不同进程间的变量共享》
 * 注意：GlobalData组件无法共享资源类型的数据，例如mysql连接、socket连接等无法共享。
 */
require_once '../vendor/autoload.php';
use GlobalData\Client;
$glob = new Client('127.0.0.1:2207');
$glob->test = [1,2,3];