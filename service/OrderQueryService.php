<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26
 * Time: 11:49
 */
require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';



class OrderQueryService{





    public static function orederQuery($appId,$appKey,$mhtOrderNo,$isTest=true){
        $param = array();
        $param["appId"] = $appId;//应用ID
        $param["mhtOrderNo"] = $mhtOrderNo;
        $param["mhtCharset"] = "UTF-8";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $param["funcode"] = "MQ001";
        $param["mhtSignType"] = "MD5";
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
