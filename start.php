<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
use Workerman\Worker;
use tpstudy\lib\plus\channel\Channel_server;
use tpstudy\lib\plus\http\Http_pusher;
use tpstudy\lib\plus\websocket\Ws_pusher;
use tpstudy\lib\plus\glob\Glob_server;

$channel = new Channel_server();

$http = new Http_pusher($http_domain . ":" . $http_port);
$http->count = 1;


$websocket = new Ws_pusher($ws_domain . ":" . $websocket_port);
$websocket->count = 1;

$glob = new Glob_server();
Worker::runAll();

