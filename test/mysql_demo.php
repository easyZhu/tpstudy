<?php
/**
 * workerman/mysql组件
 * 作用：《workerman封装好的mysql组件，跟普通的框架的相比封装垃圾点》
 */
namespace app;
require_once '../vendor/autoload.php';
use Workerman\MySQL\Connection;
$db = new Connection('127.0.0.1', '3306', 'root', 'root', 'test');
$res = $db->query("SELECT * FROM `country` ");
echo '<pre>';
var_dump($res);