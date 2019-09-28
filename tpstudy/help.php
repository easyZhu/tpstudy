<?php
//------------------------
// Tpplus 助手函数
//-------------------------
/**
 * 输出方法
 * @param $var 输出信息
 */
function prt($var)
{
    if (is_null($var) || is_bool($var) || is_object($var)) {
        var_dump($var);
        return;
    }

    if (is_array($var)) {
        echo '<pre>';
        print_r($var);
        return;
    }

    echo $var;
}

/**
 * 报错方法
 * @param $str 报错提示
 * @param int $core 报错编码
 * @throws Exception
 */
function Ero($str, $core = 0)
{
    throw new Exception($str, $core);
}

/**
 * curl
 * @param $event
 * group
 * @param $content
 * ---
 */
function curls($event,$content){
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, 'http://127.0.0.1:8484');
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, 1);
    //设置post数据
    $post_data = array(
        "event"=>$event,
        "content"=>$content,
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);

    if (!$data){
        Ero('推送错误，未开启websocket服务，请检查，liunx下请启动根目录下的start.php,windows下请启动start_for_win.bat文件',0);
    }
    //显示获得的数据
    return $data ;
}