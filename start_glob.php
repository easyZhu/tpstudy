<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
use Workerman\Worker;
use tpstudy\lib\plus\glob\Glob_server;
$glob = new Glob_server();
Worker::runAll();
