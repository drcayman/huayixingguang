<?php

namespace Drcayman\Huayixingguang;

class Lite{

    private $config;

    /**
     * Lite constructor.
     */
    public function __construct($config)
    {
        $this->config = $config;
    }


    /** 订单请求
     * @param $obj
     * @return array|mixed
     */
    public function exec($obj){
        $url= $this->config['url'].$obj->url;
        $data = (array)$obj;
        foreach ($data as $k=>&$v){
            if(is_array($v) ){
                $v=json_encode($v);
            }
        }
        unset($data['url']); //移除请求地址
        unset($data['type']); //移除请求方式
        $data['client_id']=$this->config['client_id'];
        date_default_timezone_set('Asia/Shanghai');
        $data['timestamp'] =date('Y-m-d H:i:s');
        return $this->handle($url,$data,$obj->type);
    }


    /** 获取单个产品信息
     * @param $obj
     * @return array|mixed
     */
    public function getProducts($obj){

        $url = $this->config['url'].$obj->url.'/'.$obj->id;
        $data =(array)$obj;
        unset($data['url']);
        unset($data['type']);
        $data['client_id']=$this->config['client_id'];
        date_default_timezone_set('Asia/Shanghai');
        $data['timestamp'] =date('Y-m-d H:i:s');
        return $this->handle($url,$data,$obj->type);

    }


    /** 加密方法
     * @param array $data 待加密数据
     * @return string 已加密数据
     */
    public function Sign($data){

        ksort($data);
        $str ='';
        foreach ($data as $k=>$v){

         $str = $str.$k.$v;//拼接拼接字符串



        }
        return md5($this->config['client_secret'].$str.$this->config['client_secret']);
    }


    /** 异常处理
     * @param $url
     * @param $data
     * @param string $type
     * @return array|mixed
     */

    public function handle($url, $data,$type ='POST'){

        try{
            $data['signature'] = $this->Sign($data);
            return json_decode($this->cur($url,$data,$type),true);
        }catch (Exception $e){
            return ['code'=>'403'];
        }
    }
    /** post 请求
     * @param $url
     * @param $data
     * @param $type
     * @param int $timeout
     * @return mixed
     */
    public function cur($url, $data,$type, $timeout = 300)
    {


        $curl = curl_init();
        if($type=='GET'){
            $headers = array(
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded"
            );
            $str='?';
            foreach ($data as $k=>$v){ //拼接get链接
                if(!is_array($v)){
                    $str =$str.$k.'='.urlencode($v).'&';
                }
            }
            $str = rtrim($str, "&");

            $url = $url.$str;
            curl_setopt_array($curl,array(
                CURLOPT_URL=>$url,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER=>1
            ));
        }else{
            $headers = array(

                "Cache-Control: no-cache",
            );
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => $timeout,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $type,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_SSL_VERIFYPEER=>false
            ));
        }
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }








}