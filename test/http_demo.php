<?php
/**
 * 异步非阻塞的http服务
 * 简介：《尝试模拟睡眠程序来阻塞测试，是否可以异步执行任务》
 */
require_once '../vendor/autoload.php';
use Workerman\Worker;
$worker = new Worker('tcp://0.0.0.0:6161');

$worker->onMessage = function ($connection, $host) {
    $loop = Worker::getEventLoop();
    $client = new \React\HttpClient\Client($loop);
    $request = $client->request('GET', trim($host));
    $request->on('error', function (Exception $e) use ($connection) {
        $connection->send($e);
    });
    $request->on('response', function ($response) use ($connection) {
        $response->on('data', function ($data) use ($connection) {
            $connection->send($data);
        });
    });
    $request->end();
};

Worker::runAll();