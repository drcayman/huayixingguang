# huayixingguang

123门票网 

获取 单个产品调用
(```)
$Lite->getProducts($obj)
(```)
其余调用
(```)
$Lite->exec($obj);
(```)
获取产品列表
(```) 
include_once "src/Lite.php";
include_once "src/ProductsObj/ProductsList.php";
$config = ['client_id'=>'','client_secret'=>'','url'=>''];
$obj = new \Drcayman\Huayixingguang\ProductsObj\ProductsList();
$obj->page = '1';
$lite = new \Drcayman\Huayixingguang\Lite($config);
var_dump($lite->exec($obj));
(```)
获取单个产品
(```)
include_once "src/Lite.php";
include_once "src/ProductsObj/Products.php";
$config = ['client_id'=>'','client_secret'=>'','url'=>''];
$obj = new \Drcayman\Huayixingguang\ProductsObj\Products();
$obj->id = '201795428763';
$lite = new \Drcayman\Huayixingguang\Lite($config);
var_dump($lite->getProducts($obj));
(```)
下单
(```)
include_once "src/Lite.php";
include_once "src/OrderObj/CreateOrder.php";
$config = ['client_id'=>'','client_secret'=>'','url'=>''];
$obj = new \Drcayman\Huayixingguang\OrderObj\CreateOrder();
$obj-> product_number  = '201703172489';
$obj-> partner_order_number='283773';
$obj-> idnumber ='320721199107024623';
$obj-> arrival_date ='2018-09-30';
$obj-> name='张三';
$obj-> tel='13013838820';
$obj-> line_items = [['variant_number'=>'20178974630521','quantity'=>1]];
$lite = new \Drcayman\Huayixingguang\Lite($config);
var_dump($lite->exec($obj));
(```)
查询订单
(```)
include_once "src/Lite.php";
include_once "src/OrderObj/CheckOrder.php";
$config = ['client_id'=>'','client_secret'=>'','url'=>''];
$obj = new \Drcayman\Huayixingguang\OrderObj\CheckOrder();
$obj-> order_number  = 'A8731221796';
$obj-> partner_order_number = '283773';
$lite = new \Drcayman\Huayixingguang\Lite($config);
var_dump($lite->exec($obj));
(```)
退款
(```)
include_once "src/Lite.php";
include_once "src/OrderObj/RefundOrder.php";
$config = ['client_id'=>'','client_secret'=>'','url'=>''];
$obj = new \Drcayman\Huayixingguang\OrderObj\RefundOrder();
$obj-> order_number  = 'A8731221796';
$obj-> line_items = [['variant_number'=>'20178974630521','quantity'=>1]];
$lite = new \Drcayman\Huayixingguang\Lite($config);
var_dump($lite->exec($obj));
(```)







