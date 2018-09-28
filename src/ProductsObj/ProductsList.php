<?php
/**
 * 获取产品列表
 */

namespace Drcayman\Huayixingguang\ProductsObj;
class ProductsList
{

    /**
     * @var string 请求地址
     */

    public $url='/vapi/v1/distributor/products';

    /**
     * @var string 请求方式
     */
    public $type = 'GET';
    /**
     * @var 页数
     */
    public $page;

}