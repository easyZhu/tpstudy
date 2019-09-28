<?php
namespace app\controllers;
use tpstudy\Tpstudy;
use tpstudy\lib\Controller;
use tpstudy\lib\Db;

class ItemController extends Controller
{
    // 首页方法
    public function index()
    {
            $data = '<style type="text/css">*{ padding: 0; margin: 0; }
     .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} 
     a:hover{text-decoration:underline; }
      body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px}
       h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } 
       p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;">
        <h1>:|</h1><p> Tpstudy V1<br/>
        <span style="font-size:30px">学习磨一剑 - tp-study深入了解框架而生的框架</span><br>
        </p>
        <span style="font-size:22px;">
        [ V1.0 版本由 <a href="http://wap.easyzhu.cn" target="qiniu">Easy三国OL提供</a>
         独家赞助发布 ][<a href="http://kanyun.easyzhu.cn" target="qiniu">文档</a>]</span>
         </div>';
        $this->assign('title','this is title' );
        $this->assign('Item', $data);
        $this->render();

    }

//    orm映射
    public function testDb(){
        new Db();
    }

}