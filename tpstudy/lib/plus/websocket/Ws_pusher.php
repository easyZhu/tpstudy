<?php
/**
 * 初始化一个websocket_server服务进程
 */
namespace tpstudy\lib\plus\websocket;
use Workerman\Worker;
use Workerman\Lib\Timer;
use Channel\Client;

class Ws_pusher{
    public $ws_server;
    public function __construct($domain)
    {
//        启动http服务监听客户端的请求
        $this->ws_server = new Worker($domain);
        $this->ws_server->name = 'ws_server';
        $this->ws_server->onWorkerStart = array($this,'WorkerStart');

    }

//    http进程启动时
    public function WorkerStart(){

        $worker = $this->ws_server;

        Client::connect('127.0.0.1', 2206);
//     单发
        Client::on('single', function($event_data)use($worker){
            $to_connection_id = $event_data['client_id'];
            $message = $event_data['content'];
            if(!isset($worker->connections[$to_connection_id]))
            {
                echo "connection not exists\n";
                return;
            }
            $to_connection = $worker->connections[$to_connection_id];
            $to_connection->send($message);
        });

//      分组发
        Client::on('group', function($event_data)use($worker){
            $message = $event_data['content'];
            foreach($worker->connections as $connection)
            {
                $connection->send($message);
            }
        });


//      全群发
        Client::on('all', function($event_data)use($worker){
            $to_connection_id = $event_data['to_connection_id'];
            $message = $event_data['content'];
            if(!isset($worker->connections[$to_connection_id]))
            {
                echo "connection not exists\n";
                return;
            }
            $to_connection = $worker->connections[$to_connection_id];
            $to_connection->send($message);
        });

//        var_dump('ws_start');
    }


}


