
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

&nbsp;&nbsp;&nbsp;&nbsp;[2.3 订单查询API](#2.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付订单查询](#2.3.6)

&nbsp;&nbsp;&nbsp;&nbsp;[2.4 退款API](#2.4)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[退款](#2.4.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[退款查询](#2.4.2)

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
       
   <table>
               <tr>
                   <th>字段名称</th>
                   <th>字段Key</th>
                   <th>备注</th>
               </tr>
               <tr>
                   <td>功能码</td>
                   <td>funcode</td>
                   <td>定值：WP001</td>
               </tr>
                     <tr>
                   <td>商户应用唯一标识</td>
                   <td>appId</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户订单号</td>
                   <td>mhtOrderNo</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户商品名称</td>
                   <td>mhtOrderName</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户交易类型</td>
                   <td>mhtOrderType</td>
                   <td>01 普通消费</td>
                </tr>
       <tr>
                   <td>商户订单币种类型</td>
                   <td>mhtCurrencyType</td>
                   <td>见 5.7 币种列表
注：不能为 CNY</td>
                </tr>
       <tr>
                   <td>商户订单交易金额</td>
                   <td>mhtOrderAmt</td>
                   <td>单位：分 整数，无小数点</td>
                </tr>
       <tr>
                   <td>金额币种单位标记</td>
                   <td>mhtAmtCurrFlag</td>
                   <td>0: 订单金额单位为人民币<br>
1：订单金额单位为外币
（所传的币种类型）</td>
                </tr>
         <tr>
                   <td>商户订单详情</td>
                   <td>mhtOrderDetail</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户订单超时时间</td>
                   <td>mhtOrderTimeOut</td>
                   <td>60~3600秒，默认3600</td>
                </tr>
       <tr>
                   <td>商户订单开始时间</td>
                   <td>mhtOrderStartTime</td>
                   <td>yyyyMMddHHmmss</td>
                </tr>
       <tr>
                   <td>商户后台通知URL</td>
                   <td>notifyUrl</td>
                   <td>HTTP 协议或者 HTTPS 协
议，POST 方式提交报文</td>
       </tr>
        <tr>
                   <td>商户前台通知URL</td>
                   <td>frontNotifyUrl</td>
                   <td>HTTP 协议或者 HTTPS 协
                    议，POST 方式提交报文
                (渠道类型为 90 时，一定
                    要传)</td>
                </tr>
       <tr>
                   <td>商户字符编码</td>
                   <td>mhtCharset</td>
                   <td>UTF-8</td>
                </tr>
            <tr>
                   <td>设备类型</td>
                   <td>deviceType</td>
                   <td>0600:公众号 06:手机网页 02:PC扫码</td>
                </tr>
       <tr>
                   <td>渠道类型</td>
                   <td>payChannelType</td>
                   <td>90-支付宝 80-微信</td>
        </tr>
  <tr>
                   <td>商户保留域</td>
                   <td>mhtReserved</td>
                   <td>(==非必填==)给商户使用的字段，商户可以对交易进行标记，现在支付将原样返回</td>
                </tr>
       <tr>
                   <td>商户签名方法</td>
                   <td>mhtSignType</td>
                   <td>定值:MD5</td>
                </tr>
       <tr>
                   <td>商户数据签名</td>
                   <td>mhtSignature</td>
                   <td>签名逻辑见接口见附录见 5.1 交易的 MD5签名逻辑说明。除如下字段外，其它字段都参与MD5 签名。排除的有：funcode,deviceType,mhtSignType,mhtSignature</td>
                </tr>
       <tr>
                   <td>签名方法</td>
                   <td>signType</td>
                   <td>定值：MD5</td>
                </tr>
   <tr>
                   <td>卡类型</td>
                   <td>cardType</td>
                   <td>(==非必填==)Json格式的商品列表，形如{"goods_detail": [ { "goods_name": "iphone6s","quantity": 1
        }, {"goods_name": "iphone5s","quantity": 2}]} 元素名goods_detail，goods_name，quantity不可随意更改
此字段不参与签名</td>
        </tr>
       <tr>
                   <td>商品版本</td>
                   <td>version</td>
                   <td>(==非不填==)商户商品版本 如 1.0此字段不参与签名</td>
        </tr>
   </table>  

下单返回：

       
   <table>
               <tr>
                   <th>字段名称</th>
                   <th>字段Key</th>
                   <th>备注</th>
               </tr>
               <tr>
                   <td>功能码</td>
                   <td>funcode</td>
                   <td>定值：WP001</td>
               </tr>
                     <tr>
                   <td>商户应用唯一标识</td>
                   <td>appId</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户订单号</td>
                   <td>mhtOrderNo</td>
                   <td></td>
                </tr>
       <tr>
                   <td>现在支付订单号</td>
                   <td>nowPayOrderNo</td>
                   <td></td>
                </tr>
       <tr>
                   <td>短链接</td>
                   <td>tn</td>
                   <td></td>
                </tr>
       <tr>
                   <td>签名方法</td>
                   <td>signType</td>
                   <td>MD5</td>
                </tr>
       <tr>
                   <td>响应时间</td>
                   <td>responseTime</td>
                   <td>yyyyMMddHHmmss</td>
                </tr>
       <tr>
                   <td>响应码</td>
                   <td>responseCode</td>
                   <td>见附录 5.2 响应码表币</td>
                </tr>
         <tr>
                   <td>响应信息</td>
                   <td>responseMsg</td>
                   <td>错误时返回</td>
                </tr>
       <tr>
                   <td>数据签名</td>
                   <td>signature</td>
                   <td></td>
                </tr>
      
   </table>  
   
   同步返回示例：

```
responseCode=A001&tn=weixin%253A%252F%252Fwxpay%252Fbizpayurl%253Fpr%253DqcpVAy0&appId =1460450110114100&mhtOrderNo=1460451345883&signType=MD5&nowPayOrderNo=2104166004453 143&funcode=WP001&signature=ce755e00ae4f795617498234c1c69234&responseTime=20160412165535
```



           
<h4 id='2.2'>2.2 支付结果通知</h4>

通知方式采用http post方式通知

字段含义如下:



现在支付的服务端异步发起：通讯方式：HTTP POST
|字段名称|字段 Key|格式|必填|备注|
|----|----|----|----|----|----|----|
|功能码|funcode|String(4)|Y|定值：N001|
|商户应用唯一标识|appId|String(1,40)|Y||
|商户订单号|mhtOrderNo|String(1,40)|Y||
|商户商品名称|mhtOrderName|String(1,40)|Y||
|商户交易类型|mhtOrderType|String(2)|Y|见附录 5.6 交易类型表|
|外币币种|mhtCurrencyType|String(3)|Y|见附录 5.7 币种列表|
|外币金额|mhtOrderAmt|Number(22)|Y|单位：分|
|用户付款币种|cashCurrencyType|String(3)|Y||
|用户付款金额|cashAmont|Number(22)|Y|单位：分|
|金额币种单位标记|mhtAmtCurrFlag|String(2)|Y|0: 订单金额单位为人民币 1：订单金额单位为所传的币种类型 |
|商户订单超时时间|mhtOrderTimeOut|Number(4)|N|60~3600 秒，默认 3600|
|商户订单开始时间|mhtOrderStartTime|String(14)|Y|yyyyMMddHHmmss|
|商户字符编码|mhtCharset|String(1,6)|Y|定值：UTF-8||
|设备类型|deviceType|String(2)|Y|定值:0600 公众号|
|渠道类型|payChannelType|String(2)|Y|见附录 5.5 渠道类型表|
|现在支付流水号|nowPayOrderNo|String(0,64)|Y|现在支付订单号|
|支付渠道号|channelOrderNo|String(0,18)|Y|渠道订单号|
|交易支付状态|tradeStatus|String(4)|Y|见附录 5.3 交易状态表|
|商户保留域|mhtReserved|String(100)|N|给商户使用的字段，商户可以对交易进行标记，现在支付将原样返回|
|签名方法|signType|String(1,6)|Y|定值：MD5|
|数据签名|signature|String(1,64)|Y|签名逻辑说明。除如下字段外，其它字段都参与 MD5 签名。排除的有：signType,signature|


           
<h4 id='2.3'> 2.3 订单查询API </h4>
订单查询：OrderQueryService.php

<h5 id='2.3.1'></h5>

- 用户主扫支付订单查询

        /**
         * 主扫支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @return string
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         */
        public static function orederQuery08($appId,$appKey,$mhtOrderNo,$isTest)
       
<h5 id='2.3.2'></h5>

- 用户被扫支付订单查询

        /**
         * 被扫支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function orederQuery05($appId,$appKey,$mhtOrderNo,$isTest)
        
<h5 id='2.3.3'></h5>

- 公众号支付订单查询

        /**
         * 公众号支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function orederQuery0600($appId,$appKey,$mhtOrderNo,$isTest)
        
<h5 id='2.3.4'></h5>

- H5支付订单查询

       /**
       * H5支付查询
       * @param $appId
       * @param $appKey
       * @param $mhtOrderNo
       * @param $isTest 是否测试 True 测试环境 False 生产环境
       * @return string
       */
       public static function orederQuery0601($appId,$appKey,$mhtOrderNo,$isTest)

        
<h5 id='2.3.5'></h5>

- 网页支付订单查询

      /**
       * web支付查询
       * @param $appId
       * @param $appKey
       * @param $mhtOrderNo
       * @param $isTest 是否测试 True 测试环境 False 生产环境
       * @return string
      */
      public static function orederQuery04($appId,$appKey,$mhtOrderNo,$isTest)

<h5 id='2.3.6'></h5>

- 小程序支付订单查询

        /**
         * 小程序支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function orederQuery14($appId,$appKey,$mhtOrderNo,$isTest)


订单查询接口字段含义如下:
接口接入URL：https://pay.ipaynow.cn/             请求类型：POST

<table>
        <tr>
            <th>字段名称</th>
            <th>字段Key</th>
            <th>备注</th>
        </tr>
        <tr>
            <td>功能码</td>
            <td>funcode</td>
            <td>定值：MQ002</td>
        </tr>
        <tr>
            <td>接口版本号</td>
            <td>version</td>
            <td>定值：1.0.0</td>
         </tr>
           <tr>
            <td>商户应用唯一标识</td>
            <td>appId</td>
            <td></td>
         </tr>
        <tr>
            <td>设备类型</td>
            <td>deviceType</td>
            <td></td>
         </tr>
        <tr>
            <td>商户订单号</td>
            <td>mhtOrderNo</td>
            <td></td>
         </tr>
        <tr>
            <td>商户字符集</td>
            <td>mhtCharset</td>
            <td>定值：UTF-8</td>
         </tr>
        <tr>
            <td>签名方法</td>
            <td>mhtSignType</td>
            <td>定值：MD5</td>
         </tr>
        <tr>
            <td>数据签名</td>
            <td>mhtSignature</td>
            <td>除mhtSignature字段外，所有参数都参与MD5签名。</td>
         </tr>
    </table>
        
        
<h4 id='2.4'> 2.4 退款API </h4>
    RefundService.php

<h5 id='2.4.1'></h5>

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

<h5 id='2.4.2'></h5>

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

<h5 id='2.4.3'></h5
         
