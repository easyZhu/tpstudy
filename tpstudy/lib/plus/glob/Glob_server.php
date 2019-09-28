<?php
namespace tpstudy\lib\plus\glob;
use Workerman\Worker;
use GlobalData\Server;

class Glob_server{
    public function __construct()
    {
        // 监听端口
        new Server('127.0.0.1', 2207);
        Worker::runAll();
    }
}