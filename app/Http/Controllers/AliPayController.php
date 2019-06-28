<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AliPayController extends Controller
{
    public $app_id;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath = '';  //路径
    public $aliPubKey = '';  //路径
    public $privateKey = 'MIIEowIBAAKCAQEAtis83sr2x4Hpo40ME4gGOW5VYkU4T3RBUk9SBWWZQ+NrIP3rgAmwf1xPJSIgi7RiOhyaFpXPhoz9da47owum0mh7oru5zExvERXeZqT+Jf8VhOVgwFetxD5Y7V+5P59tcMLr7iRszvUiwPYe/xPhCbl+WdQxkhYbQgJxOwRgk1s6bESVtDT3CpjOQcSJf89EK0XH1NtKXc7QZv/1hiHHgkG5QxBqiUUeW7wlm33+DE4qrw2KFrzPaih+oLAYEH4965GPcVEVCWbkwbLGuKa9gHwUqvGN4og4KiKiIx7TyVRMsIDTySd6bYbXliIhCRH6q6WXLy3Ql13BroCAifSUqwIDAQABAoIBAHs3M6zeS50WWhmtxYVQdCVUY5xchYH4eFZcIHZWChzJLiTamve3lhIPNdlABBN6pxX3UqIEIqI3qxh2CRB3SRb4ZOflYf61lEpSKGP1JZI9vyhsncx7gaVDJpMoM/y8sSGcNkiViqNRW3h5AO43W/df5/6KcB0Hptg3Hq90fn4sCm1hvzdFOK4jfgAiDqjdRsUWx3D2iYxrYd8YKHumEcswaN/Itr+i+uHNl/ht508P5fZ0+8/auwUh2V8Iqro/K+sA6t9frEd1HkuO7OUoJg3JGRJzsSlM5Eelkrg+jNQUAn8HPt4ynEAu6/f3YvfZXox6e1060y9Um89AYtr3aUECgYEA2BlWeiisIIZ6mplMM/BMhYXdD2yOY412YA0jcCjXsVJPDavY2iaojFwWaIStwOv4D2WLbvHG7vhFusqIOUYMpdsgDSgC14u1q9yRDaM7FhAJXkeCjSgQ2H4zUj16nc/u0f5XzT3fB62/eEB7kn/EjLiyyQSZSYDE/deyfvs2io0CgYEA184T90V31hS0AgRo6PikPhnlZAu5pPXVDY8Sw2/HNsBzu4doOODefBJbKO8L7poge/7Uj9H95iyx2MKxfja6Xwoh0wtKA8p4aG6YjKkwRGVpM55zdqaccODe2dHcLV2aBKJ88FYNBQFpg5vbWP5lpekxr5U5AELbyNpKsMdfKhcCgYB5SxeH76ZVh0Xv2pW0HW/GDlH7I1J0vGUyGo3GmZYfmHR41vkb0VEPn2yQc9BXFduhQLzXo+umHEJ/SsjVZOUafvjpiYi21Vs+QMpGHlW+13d6rKaxdkimS4eg5JMbWyfQRHOh5tV1qOdsprz1iLOYzN7FB8jGQfnQBS7SKUz+zQKBgQC0rucKlhAyntzj/3sy69Lf5+CmtiZ11hnOo2arWTArSFDdxw5c6PF+YgQPLq4H1OWzy3V/AOuaxvsUqFXhfcLnBd2yDHao2+GaVlbFFnbCHUJKpLS5t9+tpqkPKGU3WnI0xTLkKrf14+vK9Dhft4e1tJwUDVVPQasw7IuynQqxewKBgBT9TELB5EFoGjrBVCOTW8dLVh8BvntOR80xxUWWkK9wTUMEXrSQDjbPA3IsJPhmy7weRsRi7GNo0zxqbl/WlYPW+XcS28X/9nIEPXmMHJm20xfhtjXDclN6jviU/2fEo+vJ3I1NPT1cnZsfGdbQxkKPcoIKjbGBAyFUVoO2ycZQ';
    public $publicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtis83sr2x4Hpo40ME4gGOW5VYkU4T3RBUk9SBWWZQ+NrIP3rgAmwf1xPJSIgi7RiOhyaFpXPhoz9da47owum0mh7oru5zExvERXeZqT+Jf8VhOVgwFetxD5Y7V+5P59tcMLr7iRszvUiwPYe/xPhCbl+WdQxkhYbQgJxOwRgk1s6bESVtDT3CpjOQcSJf89EK0XH1NtKXc7QZv/1hiHHgkG5QxBqiUUeW7wlm33+DE4qrw2KFrzPaih+oLAYEH4965GPcVEVCWbkwbLGuKa9gHwUqvGN4og4KiKiIx7TyVRMsIDTySd6bYbXliIhCRH6q6WXLy3Ql13BroCAifSUqwIDAQAB';
    public function __construct()
    {
        $this->app_id = '2016100100636208';
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('APP_URL').'/notify_url';
        $this->return_url = env('APP_URL').'/return_url';
    }
    
    
    /**
     * 订单支付
     * @param $oid
     */
    public function pay(Request $request)
    {
        // file_put_contents(storage_path('logs/alipay.log'),"\nqqqq\n",FILE_APPEND);
        // die();
        //验证订单状态 是否已支付 是否是有效订单
        //$order_info = OrderModel::where(['oid'=>$oid])->first()->toArray();
        //判断订单是否已被支付
        // if($order_info['is_pay']==1){
        //     die("订单已支付，请勿重复支付");
        // }
        //判断订单是否已被删除
        // if($order_info['is_delete']==1){
        //     die("订单已被删除，无法支付");
        // }
        // $oid = time().mt_rand(1000,1111);  //订单编号
        //业务参数
        $oid=$request->get('id');
        // dd( $oid);
        $pay_money = DB::table('order')->where('oid',$oid)->value('pay_money');
        $bizcont = [
            'subject'           => 'Lening-Order: ' .$oid,
            'out_trade_no'      => $oid,
            'total_amount'      => $pay_money,
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
        ];
        // dd($bizcont);
        //公共参数
        $data = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.page.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,        //异步通知地址
            'return_url'   => $this->return_url,        // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        //签名
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $param_str = '?';
        foreach($data as $k=>$v){
            $param_str .= $k.'='.urlencode($v) . '&';
        }
        $url = rtrim($param_str,'&');
        $url = $this->gate_way . $url;
        header("Location:".$url);
    }
    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }
    protected function sign($data) {
        if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
            $priKey=$this->privateKey;
            $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($priKey, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";
        }else{
            $priKey = file_get_contents($this->rsaPrivateKeyFilePath);
            $res = openssl_get_privatekey($priKey);
        }
        
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }
    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }
    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }
    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
    /**
     * 支付宝同步通知回调
     */
    public function aliReturn()
    {
        header('Refresh:2;url=/order/list');
        echo "订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转';
//        echo '<pre>';print_r($_GET);echo '</pre>';die;
//        //验签 支付宝的公钥
//        if(!$this->verify($_GET)){
//            die('簽名失敗');
//        }
//
//        //验证交易状态
////        if($_GET['']){
////
////        }
////
//
//        //处理订单逻辑
//        $this->dealOrder($_GET);
    }
    /**
     * 支付宝异步通知
     */
    public function aliNotify()
    {
        $data = json_encode($_POST);
        $log_str = '>>>> '.date('Y-m-d H:i:s') . $data . "<<<<\n\n";
        //记录日志
        file_put_contents('logs/alipay.log',$log_str,FILE_APPEND);
        //验签
        $res = $this->verify($_POST);
        $log_str = '>>>> ' . date('Y-m-d H:i:s');
        if($res === false){
            //记录日志 验签失败
            $log_str .= " Sign Failed!<<<<< \n\n";
            file_put_contents('logs/alipay.log',$log_str,FILE_APPEND);
        }else{
            $log_str .= " Sign OK!<<<<< \n\n";
            file_put_contents('logs/alipay.log',$log_str,FILE_APPEND);
        }
        //验证订单交易状态
        if($_POST['trade_status']=='TRADE_SUCCESS'){
            //更新订单状态
            $oid = $_POST['out_trade_no'];     //商户订单号
            $info = [
                'is_pay'        => 1,       //支付状态  0未支付 1已支付
                'pay_amount'    => $_POST['total_amount'] * 100,    //支付金额
                'pay_time'      => strtotime($_POST['gmt_payment']), //支付时间
                'plat_oid'      => $_POST['trade_no'],      //支付宝订单号
                'plat'          => 1,      //平台编号 1支付宝 2微信 
            ];
            OrderModel::where(['oid'=>$oid])->update($info);
        }
        //处理订单逻辑
        $this->dealOrder($_POST);
        echo 'success';
    }
    //验签
    function verify($params) {
        $sign = $params['sign'];
        $params['sign_type'] = null;
        $params['sign'] = null;

        if($this->checkEmpty($this->aliPubKey)){
            $pubKey= $this->publicKey;
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";
        }else {
            //读取公钥文件
            $pubKey = file_get_contents($this->aliPubKey);
            //转换为openssl格式密钥
            $res = openssl_get_publickey($pubKey);
        }
        
       
        
        //转换为openssl格式密钥
        $res = openssl_get_publickey($pubKey);
        ($res) or die('支付宝RSA公钥错误。请检查公钥文件格式是否正确');
        //调用openssl内置方法验签，返回bool值
        $result = (openssl_verify($this->getSignContent($params), base64_decode($sign), $res, OPENSSL_ALGO_SHA256)===1);
        openssl_free_key($res);
        return $result;
    }
    /**
     * 处理订单逻辑 更新订单 支付状态 更新订单支付金额 支付时间
     * @param $data
     */
    public function dealOrder($data)
    {
        //加积分
        //减库存
    }
}
