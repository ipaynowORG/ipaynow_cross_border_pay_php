<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26
 * Time: 11:49
 */
require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';



class TradeService{



    /**
     * 微信PC扫码
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $mhtCurrencyType  商户订单币种类型
     * @param $notifyUrl  商户后台通知URL
     * @param $detail 商户商品列表
     * @param $version 商品版本
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_pc($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,"80","02","",$detail,$version,$isTest);
    }



    /**
     * 支付宝手机网页
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $mhtCurrencyType  商户订单币种类型
     * @param $notifyUrl  商户后台通知URL
     * @param $detail 商户商品列表
     * @param $version 商品版本
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_wap($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,"90","06","",$detail,$version,$isTest);
    }

    /**
     * 支付宝PC扫码
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $mhtCurrencyType  商户订单币种类型
     * @param $notifyUrl  商户后台通知URL
     * @param $detail 商户商品列表
     * @param $version 商品版本
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_pc($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,"90","02","",$detail,$version,$isTest);
    }


    /**
     * 微信公众号
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $mhtCurrencyType  商户订单币种类型
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_p_account($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,"80","0600","",$detail,$version,$isTest);
    }






    //下单
    public static function trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$payChannelType,$deviceType,$channelAuthCode,$detail,$version,$isTest){
        $param = array();
        $param["mhtOrderName"] = $mhtOrderName;
        $param["mhtOrderAmt"] = $mhtOrderAmt;
        $param["mhtOrderDetail"] = $mhtOrderDetail;
        $param["appId"] = $appId;//应用ID
        if (strlen($mhtOrderNo) > 0){
            $param["mhtOrderNo"] = $mhtOrderNo;
        }else{
            $param["mhtOrderNo"] = "mhtOrderNo".date("YmdHis");
        }
        $param["mhtOrderType"] = "01";
        $param["mhtCurrencyType"] = $mhtCurrencyType; //币种 不能为CNY
        $param["mhtAmtCurrFlag"] = "1";// 0: 订单金额单位为人民币 1：订单金额单位为外币 （所传的币种类型）
        $param["mhtOrderTimeOut"] = "3600";
        $param["mhtOrderStartTime"] = date("YmdHis");
        $param["notifyUrl"] = $notifyUrl;
        if (strlen($frontNotifyUrl) > 0) {
            $param["frontNotifyUrl"] = $frontNotifyUrl;
        }
        $param["payChannelType"] = $payChannelType;
        $param["mhtCharset"] = "UTF-8";
        if (strlen($channelAuthCode) > 0){
            $param["channelAuthCode"] = $channelAuthCode;
        }
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $param["funcode"] = "WP001";
        $param["deviceType"] = $deviceType;
        $param["mhtSignType"] = "MD5";
        if (strlen($detail)){
            $param["detail"] = $detail;
        }
        if (strlen($version)){
            $param["version"] = $version;
        }
        $req_str = ParamUtil::createParamString($param, false, false);
        if ($isTest){
            $url = "http://dby.ipaynow.cn/global";
        }else{
            $url = "https://gapi.ipaynow.cn/global";
        }
        echo $url;
        echo "\n";
        echo $req_str;
        echo "\n";
        $resp_str = HttpUtil::send_post($url,$req_str);
        return urldecode($resp_str);
    }


}
