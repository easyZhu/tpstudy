<?php
/**
 * 初始化一个http_server服务进程
 */
namespace tpstudy\lib\plus\http;
use Workerman\Worker;
use Workerman\Lib\Timer;
use Channel\Client;
class Http_pusher{
//  http_服务
    public $http_server;

    public function __construct($domain)
    {
//        启动http服务监听客户端的请求
        $this->http_server = new Worker($domain);
        $this->http_server->name = 'http_server';
        $this->http_server->onWorkerStart = array($this,'WorkerStart');
        $this->http_server->onMessage = array($this,'apiMessage');
    }

//    http启动时
    public function WorkerStart(){
//   连接channel服务端进程
        Client::connect('127.0.0.1', 2206);
//   http服务进程的id
//   var_dump('http_start\n Client_channel start');

    }

//    http请求过来时
    public function apiMessage($connection, $data){

//    响应http客户端发送成功
        $connection->send('ok');
//    接收过来的post数据

//    制定哪个进程接收消息，暂时不打开
//        $worker_id = $_POST['worker_id'];

//        $client_id = $_POST['client_id'];
        $event = $_POST['event'];
        $content = $_POST['content'];

//    推送给websocket进程订阅好的事件
        Client::publish($event, array(
            'content'          => $content
        ));

    }

}


