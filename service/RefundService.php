<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/11/8
 * Time: 9:59
 */

require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';

class RefundService{


    /**
     * 退款接口
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $nowPayOrderNo 现在支付交易流水号
     * @param $mhtRefundNo 退款号
     * @param $amount 单位(外币)：元  最多两位小数
     * @param $reason 退款原因
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function refund($appId,$appKey,$nowPayOrderNo,$mhtRefundNo,$amount,$reason,$isTest=true){
        $param = array();
        $param["funcode"] = "R001";
//        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["nowPayOrderNo"] = $nowPayOrderNo;
        $param["mhtRefundNo"] = $mhtRefundNo;
        $param["amount"] = $amount;
        $param["reason"] = $reason;
        $param["mhtCharset"] = "UTF-8";
        $param["signType"] = "MD5";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
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

    /**
     * 退款查询
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtRefundNo 商户退款单号
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function refundQuery($appId,$appKey,$mhtRefundNo,$isTest){
        $param = array();
        $param["funcode"] = "Q001";
//        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["mhtRefundNo"] = $mhtRefundNo;
        $param["signType"] = "MD5";
        $param["mhtCharset"] = "UTF-8";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
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