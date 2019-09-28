<?php
namespace app\controllers;
use Tpplus\lib\Controller;
class PusherController extends Controller
{
    public function index()
    {
//  推送助手函数
     $data = curls('group','广播');
//  打印助手函数
     prt($data);
    }
}