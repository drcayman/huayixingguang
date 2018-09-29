<?php
/**
 *  创建订单
 */
namespace Drcayman\Huayixingguang\OrderObj;

class CreateOrder
{

    /**
     * @var string 请求url
     */
    public $url='/vapi/v1/distributor/orders';

    /**
     * @var string 请求方式
     */

    public $type = 'POST';
    /**
     * @var  string 商品编码
     */
    public $product_number;


    /**
     * @var string 唯一id 防止重复下单
     */
    public $partner_order_number;


    /**
     * @var string 游玩日期
     */
    public $arrival_date;


    /**
     * @var string 身份证号码
     */
    public $idnumber;


    /**
     * @var string 张三
     */
    public $name;

    /**
     * @var string 联系电话
     */
    public $tel;


    public $line_items;



}