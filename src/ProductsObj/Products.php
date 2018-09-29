<?php
/**
 * 获取单个产品信息 包含产品价格
 */

namespace Drcayman\Huayixingguang\ProductsObj;


class Products
{

    /** 请求地址
     * @var string
     */
    public $url = '/vapi/v2/distributor/products';

    /** 请求方式
     * @var string
     */
    public $type= 'GET';

    /** 产品id
     * @var string
     */
    public $id;

}