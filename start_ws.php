<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
use Workerman\Worker;
use tpstudy\lib\plus\websocket\Ws_pusher;
$pusher2 = new Ws_pusher($ws_domain.":".$websocket_port);

// 只能是1
$pusher2->count = 1;

Worker::runAll();
