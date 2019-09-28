<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
use Workerman\Worker;
use tpstudy\lib\plus\http\Http_pusher;

$pusher = new Http_pusher($http_domain.":".$http_port);
// 只能是1
$pusher->count = 1;

Worker::runAll();
