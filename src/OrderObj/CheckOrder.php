<?php
/**
 * 订单查询
 */

namespace Drcayman\Huayixingguang\OrderObj;


class CheckOrder
{

    /**
     * @var string 请求地址
     */

    public $url='/vapi/v1/distributor/order';


    /**
     * @var string 请求方式
     */

    public $type = 'GET';
    

    /**
     * @var string 订单编号
     */
    public $order_number;


    /***
     * @var string 唯一id 下单时候传进来的
     */
    public $partner_order_number;


}