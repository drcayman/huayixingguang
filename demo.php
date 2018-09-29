<?php
/**
 * Created by PhpStorm.
 * User: yinzhiqiang
 * Date: 2018/9/29
 * Time: 上午8:18
 */



include_once "src/Lite.php";
include_once "src/OrderObj/RefundOrder.php";
$config = ['client_id'=>'','client_secret'=>'','url'=>''];


$obj = new \Drcayman\Huayixingguang\OrderObj\RefundOrder();

$obj-> order_number  = 'A8731221796';
$obj-> line_items = [['variant_number'=>'20178974630521','quantity'=>1]];
$lite = new \Drcayman\Huayixingguang\Lite($config);
var_dump($lite->exec($obj));
