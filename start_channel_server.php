<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
use Workerman\Worker;
use tpstudy\lib\plus\channel\Channel_server;
$channel = new Channel_server();
Worker::runAll();
