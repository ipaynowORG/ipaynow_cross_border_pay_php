
# 跨境聚合支付SDK使用说明 #

## 版本变更记录 ##

- 1.0.0 : 初稿

## 目录 ##

[1. 概述](#1)

&nbsp;&nbsp;&nbsp;&nbsp;[1.1 简介](#1.1)

&nbsp;&nbsp;&nbsp;&nbsp;[1.2 如何获取](#1.2)

&nbsp;&nbsp;&nbsp;&nbsp;[1.3 DEMO使用](#1.3)

[2. API](#2)

&nbsp;&nbsp;&nbsp;&nbsp;[2.1 跨境聚合交易API](#2.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信PC扫码支付](#2.1.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝PC扫码支付](#2.1.2)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信公众号支付](#2.1.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝手机网页](#2.1.4)

&nbsp;&nbsp;&nbsp;&nbsp;[2.2 支付结果通知](#2.2)

&nbsp;&nbsp;&nbsp;&nbsp;[2.2 支付结果前台通知](#2.3)

&nbsp;&nbsp;&nbsp;&nbsp;[2.3 订单查询API](#2.4)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付订单查询](#2.4.1)

&nbsp;&nbsp;&nbsp;&nbsp;[2.4 退款API](#2.5)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[退款](#2.5.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[退款查询](#2.5.2)

[3. 接口附件说明](#3)

<h2 id='1'> 1. 概述 </h2>
<h4 id='1.1'> 1.1 简介 </h4>
- 聚合支付SDK PHP版本,建议使用php7。

- 支付接口使用的工具类: 

    HttpUtil.php 发送post请求
    
    ParamUtil.php 请求参数加签名

 <h4 id='1.2'>1.2 如何获取</h4>
 

[demo源码](https://github.com/ipaynowORG/ipaynow_cross_border_pay_php.git)


<h4 id='1.3'>1.3 DEMO使用</h4>
- 支付测试实例：example
    TradeTest.php 直接运行即可

   使用方法: 
        
     导入 
     require_once 'service/TradeService.php';
     
   之后便可在您的代码中开始调用现在支付 PHP SDK
   
   使用实例 ：
     
     cd 进入example文件夹
     运行 TradeTest.php

## 2. API ##
<h4 id='2.1'> 2.1 跨境聚合交易API </h4>

### 2.1 工具说明 ###

- 下单接口
    * TradeService.php  
       <h5 id='2.1.1'></h5>
       
       - 微信PC扫码支付
       
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
              public static function wx_pc($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true)
           
       <h5 id='2.1.2'></h5>
       
       - 支付宝PC扫码支付
       
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
              public static function ali_pc($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true)
       <h5 id='2.1.3'></h5>
       
       - 微信公众号支付
            
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
             public static function wx_p_account($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true)
           
       <h5 id='2.1.4'></h5>
 
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
          public static function   ali_wap($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$mhtCurrencyType,$notifyUrl,$frontNotifyUrl,$detail,$version,$isTest=true)
      
           
   下单接口字段含义如下:
       
|字段名称|字段 Key|格式|必填|备注|
|----|----|----|----|----|
|功能码|funcode|String(5)|Y|定值：WP001|
|商户应用唯一标识|appId|String(1,40)|Y|
|商户订单号|mhtOrderNo|String(1,40)|Y|
|商户商品名称|mhtOrderName|String(1,40)|Y|
|商户交易类型|mhtOrderType|String(1,40)|Y|01 普通消费|
|商户订单币种类型|mhtCurrencyType|String (3)|Y|见 3.4 [币种列表](#3.4)注：不能为 CNY|
|商户订单交易金额|mhtOrderAmt|Number(22)|Y|单位：分 整数，无小数点|
|金额币种单位标记|mhtAmtCurrFlag|String(2)|Y|0: 订单金额单位为人民币 1：订单金额单位为外币（所传的币种类型）||
|商户订单详情|mhtOrderDetail|String(0,200)|Y|
|商户订单超时时间|mhtOrderTimeOut|Number(4)|N|60~3600 秒，默认 3600|
|商户订单开始时间|mhtOrderStartTime|String (14)|Y|yyyyMMddHHmms|
|商户后台通知 URL|notifyUrl|String(1,200)|Y|HTTP 协议或者 HTTPS 协议，POST 方式提交报文|
|商户前台通知 URL|frontNotifyUrl|String(1,200)|N|HTTP 协议或者 HTTPS 协
|商户字符编码|mhtCharset|String(1,16)|Y|UTF-8|
|设备类型|deviceType|String(2)|Y|定值:0600:公众号 06:手机网页 02:PC扫码 |
|渠道类型|payChannelType|String(2)|Y|90:支付宝 80:微信|
|商户保留域|mhtReserved|String(100)|N|给商户使用的字段，商户可以对交易进行标记，现在支付将原样返回|
|商户签名方法|mhtSignType|定值|Y|MD5|
|商户数据签名|mhtSignature|MAX64TEXT|Y|签名逻辑见接口见附录 3.1 [交易的 MD5 签名逻辑说明](#3.1)。除如下字段外，其它字段都参与MD5 签名。排除的有：funcode,deviceType,mhtSignType,mhtSignature|
|商户商品列表|detail|String(500)|N|Json格式的商品列表，形如{"goods_detail":[<br>{<br>"goods_name": "iphone6s","quantity": 1},"goods_name": "iphone5s",<br>"quantity": 2]<br>}<br>元素名goods_detail，goods_name，quantity不可随意更改,==此字段不参与签名==|
|商品版本|version|String(10)|N|商户商品版本<br>如1.0<br>==此字段不参与签名==|
同步返回:

|字段名称|字段 Key|格式|必填|备注|
|---|---|---|---|---|---|
|功能码|funcode|String(5)|Y|定值：WP001|
|商户应用唯一标识|appId|String(1,40)|Y|
|商户订单号|mhtOrderNo|String(1,40)|Y|
|现在支付订单号|nowPayOrderNo|String(1,40)|Y|
|短链接|tn|String(1,40)|N|
|签名方法|signType|String(1,6)|Y|MD5|
|响应时间|responseTime|String(14)|Y|yyyyMMddHHmmss|
|响应码|responseCode|String(4)|Y|见附录 3.2  [响应码表](#3.2)|
|响应信息|responseMsg|String(200)|N|错误时返回|
|数据签名|signature|String(1,64)|Y|签名逻辑见接口附录说明 3.1 [交易的 MD5 签名逻辑说明](#3.1)。除如下字段外，其它字段都参与 MD5 签名。排除的有：signType,signature|

   同步返回示例：

```
responseCode=A001&tn=weixin%253A%252F%252Fwxpay%252Fbizpayurl%253Fpr%253DqcpVAy0&appId =1460450110114100&mhtOrderNo=1460451345883&signType=MD5&nowPayOrderNo=2104166004453 143&funcode=WP001&signature=ce755e00ae4f795617498234c1c69234&responseTime=20160412165535
```



           
<h4 id='2.2'>2.2 支付结果通知</h4>
现在支付的服务端异步发起：通讯方式：HTTP POST

|字段名称|字段 Key|格式|必填|备注|
|----|----|----|----|----|
|功能码|funcode|String(4)|Y|定值：N001|
|商户应用唯一标识|appId|String(1,40)|Y||
|商户订单号|mhtOrderNo|String(1,40)|Y||
|商户商品名称|mhtOrderName|String(1,40)|Y||
|商户交易类型|mhtOrderType|String(2)|Y|01 普通消费|
|外币币种|mhtCurrencyType|String(3)|Y|见附录 3.4 [币种列表](#3.4)|
|外币金额|mhtOrderAmt|Number(22)|Y|单位：分|
|用户付款币种|cashCurrencyType|String(3)|Y||
|用户付款金额|cashAmont|Number(22)|Y|单位：分|
|金额币种单位标记|mhtAmtCurrFlag|String(2)|Y|0: 订单金额单位为人民币 1：订单金额单位为所传的币种类型 |
|商户订单超时时间|mhtOrderTimeOut|Number(4)|N|60~3600 秒，默认 3600|
|商户订单开始时间|mhtOrderStartTime|String(14)|Y|yyyyMMddHHmmss|
|商户字符编码|mhtCharset|String(1,6)|Y|定值：UTF-8||
|设备类型|deviceType|String(2)|Y|定值:0600:公众号 06:手机网页 02:PC扫码 |
|渠道类型|payChannelType|String(2)|Y|90:支付宝 80:微信|
|现在支付流水号|nowPayOrderNo|String(0,64)|Y|现在支付订单号|
|支付渠道号|channelOrderNo|String(0,18)|Y|渠道订单号|
|交易支付状态|tradeStatus|String(4)|Y|见附录 3.3  [交易状态表](#3.3)|
|商户保留域|mhtReserved|String(100)|N|给商户使用的字段，商户可以对交易进行标记，现在支付将原样返回|
|签名方法|signType|String(1,6)|Y|定值：MD5|
|数据签名|signature|String(1,64)|Y|签名逻辑说明。除如下字段外，其它字段都参与 MD5 签名。排除的有：signType,signature|
服务端通知接口接入注意事项：

1、通知方式采用 HTTP POST 方式通知

2、报文数据以字符串流的形式放在报文体中，所以直接 getParameter 是得不到数据的。

<h4 id='2.3'>2.3 支付结果前台通知</h4>
现在支付的服务端异步发起：通讯方式：HTTP POST

|字段名称|字段 Key|格式|必填|备注|
|----|----|----|----|----|
|功能码|funcode|String(4)|Y|定值：N002|
|商户应用唯一标识|appId|String(1,40)|Y|
|商户订单号|mhtOrderNo|String(1,40)|Y|
|现在支付订单号|nowPayOrderNo|String(1,40)|Y|
|商户字符编码|mhtCharset|String(1,6)|Y|定值：UTF-8|
|交易支付状态|tradeStatus|String(4)|Y|见附录 3.3  [交易状态表](#3.3)|
|商户保留域|mhtReserved|String(100)|N|UrlEncode 后的值返回注：接收后请先UrlDecode，再进行验签|
|签名方法|signType|String(1,6)|Y|定值：MD5|
|数据签名|signature|String(1,64)|Y|签名逻辑见接口见附录 3.1 [交易的 MD5 签名逻辑说明](#3.1)。除如下字段外，其它字段都参与MD5 签名。排除的有：signType,signature。|

           
<h4 id='2.4'> 2.4 订单查询API </h4>
订单查询：OrderQueryService.php

<h5 id='2.4.1'></h5>

- 跨境支付订单查询

        /**
         * 跨境支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @return string
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         */
        public static function orederQuery($appId,$appKey,$mhtOrderNo,$isTest)
       

订单查询接口字段含义如下:
接口接入URL：https://pay.ipaynow.cn/             请求类型：POST

|字段名称|字段 Key|格式|必填|备注|
|---|---|---|---|---|---|
|功能码|funcode|String(5)|Y|定值：MQ001|
|商户应用唯一标识|appId|String(1,40)|Y|
|商户订单号|mhtOrderNo|String(1,40)|Y|
|商户字符集|mhtCharset|String(1,6)|Y|UTF-8|
|签名方法|mhtSignType|String(1,6)|Y|MD5|
|数据签名|mhtSignature|String(1,64)|Y|其它字段都参与 MD5 签|


返回数据：

|字段名称|字段 Key|格式|必填|备注|
|---|---|---|---|---|---|
|商户应用唯一标识|appId|String(1,40)|Y|
|商户订单号|mhtOrderNo|String(1,40)|Y|
|商户商品名称|mhtOrderName|String(1,40)|Y|
|订单交易类型|mhtOrderType|String(2)|Y|01:普通消费|
|外币币种|mhtCurrencyType|String(3)|Y|见附录 3.4 [币种列表](#3.4)|
|外币金额|mhtOrderAmt|Number(22)|Y|单位：分|
|用户付款币种|cashCurrencyType|String(3)|Y|
|用户付款金额|cashAmont|Number(22)|Y|单位：分|
|金额币种单位标记|mhtAmtCurrFlag|String(2)|Y|0: 订单金额单位为人民币 1：订单金额单位为所传的币种类型|
|订单超时时间|mhtOrderTimeOut|Number(4)|N|60~3600 秒，默认 3600|
|订单开始时间|mhtOrderStartTime|String(14)|Y|yyyyMMddHHmmss|
|交易字符编码|mhtCharset|String(1,6)|Y|UTF-8|
|设备类型|deviceType|String(2)|Y|定值:0600:公众号 06:手机网页 02:PC扫码 |
|用户所选渠道类型|payChannelType|String(2)|Y|90:支付宝 80:微信表|
|交易状态|tradeStatus|String(4)|Y|见附录 3.3  [交易状态表](#3.3)|
|现在支付流水号|nowPayOrderNo|String(0,64)|Y|现在支付订单号|
|支付渠道号|channelOrderNo|String(0,18)|Y|渠道订单号|
|响应时间|responseTime|String(14)|Y|yyyyMMddHHmmss|
|响应码|responseCode|String(4)|Y|见附录 3.2  [响应码表](#3.2)|
|响应信息|responseMsg|String(1,100)|N|错误原因|
|签名方法|signType|String(1,6)|Y|MD5|
|数据签名|signature|String(1,64)|Y|签名逻辑见接口附录 3.1 [交易的 MD5 签名逻辑说明](#3.1)。除如下字段外，其它字段都参与 MD5 签名。排除的有：signType,signature|
        
        
<h4 id='2.5'> 2.5 退款API </h4>
    RefundService.php

<h5 id='2.5.1'></h5>

- 退款
       
        /**
         * 退款接口
         * @param $appId 应用Id
         * @param $appKey 应用秘钥
         * @param $mhtOrderNo 原订单号
         * @param $mhtRefundNo 退款号
         * @param $amount 退款金额（退款金额不能大于可清算的支付金额）
         * @param $reason 退款原因
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function refund($appId,$appKey,$mhtOrderNo,$mhtRefundNo,$amount,$reason,$isTest)

<h5 id='2.5.2'></h5>

- 退款查询

         /**
          * 退款查询
          * @param $appId 应用Id
          * @param $appKey 应用秘钥
          * @param $mhtRefundNo 退款单号
          * @param $isTest 是否测试 True 测试环境 False 生产环境
          * @return string
          */
         public static function refundQuery($appId,$appKey,$mhtRefundNo,$isTest)

<h5 id='3'></h5>
3 接口附录说明

<h5 id='3.1'></h5>
3.1 交易的 MD5 签名逻辑

第一步：对参与 MD5 签名的字段按字典升序排序后，分别取值后并排除值为空的字段键值对，
最后组成 key1=value1&key2=value2....keyn=valuen	"表单字符串"。

第二步：对 MD5 密钥进行加密得到"密钥 MD5 值"。

第三步：最后对 第一步中得到的表单字符串&第二步得到的密钥 MD5 值 做 MD5 签名 PS : MD5密钥是用户在注册应用的时候生成的， 每个应用一个 MD5 密钥。

<h5 id='3.2'></h5>
3.2 交易响应码表

|响应码|含义|
|----|----|
|A001|支付成功|
|A002|支付失败|
|A003|未知状态|

<h5 id='3.3'></h5>
3.3 交易支付状态表

|响应码|含义|
|----|----|
|A00I|订单未处理|
|A001|订单支付成功|
|A002|订单支付失败|
|A003|支付结果未知|
|A004|订单受理成功|
|A005|订单受理失败|

3.4 币种列表

|货币符号|货币名称|
|---|---|
|GBP|英镑|
|HKD|港币|
|USD|美元|
|CHF|瑞士法郎|
|SGD|新加坡元|
|SEK|瑞典克朗|
|DKK|丹麦克朗|
|NOK|挪威克朗|
|JPY|日元|
|CAD|加拿大元|
|AUD|澳大利亚元|
|EUR|欧元|
|NZD|新西兰元|
|RUB|俄罗斯卢布|
|MOP|澳门元|
|KRW|韩币|
|THB|泰铢|
|TWD|台币|
|IDR|印尼卢比|