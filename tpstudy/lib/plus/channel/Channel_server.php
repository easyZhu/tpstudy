<?php
/**
 * 初始化一个Channel_server服务进程
 */
namespace tpstudy\lib\plus\channel;
use Channel\Server;
class Channel_server{

    public function  __construct()
    {
        $channel_server = new Server('0.0.0.0', 2206);
    }
}