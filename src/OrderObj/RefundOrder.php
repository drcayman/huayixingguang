<?php
/**
 * Created by PhpStorm.
 * User: yinzhiqiang
 * Date: 2018/9/28
 * Time: 下午5:03
 */

namespace Drcayman\Huayixingguang\PayObj;


class RefundOrder
{


    /**
     * @var string 请求地址
     */

    public $url='/vapi/v1/distributor/return_order';


    /**
     * @var string 请求方式
     */

    public $type = 'POST';


    /**
     * @var string 订单编号
     */
    public $order_number;

    /**
     * @var string 门票编码和数量
     */
    public $line_items;

}