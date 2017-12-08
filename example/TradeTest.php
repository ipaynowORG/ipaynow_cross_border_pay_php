<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26wx_
 * Time: 11:49
 */
require_once '../service/TradeService.php';
//print TradeService::ali_trade04("xxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxxx","php orderNo", "orderName php", "orderDetail",
//    "1","https://op-tester.ipaynow.cn/paytest/notify","https://op-tester.ipaynow.cn/paytest/notify","0");


//print TradeService::wx_p_account("1512462141589110","8yxER8gduXkA0tRKbkRv9YlPgN9y6Epb","php_cross_border2", "orderName_php", "orderDetail",
//    "10","NZD","1","www.baidu.com","www.baidu.com","{ 'goods_detail': [ { 'goods_name':
//     'iphone6s', 'quantity': 1 }, {'goods_name': 'iphone5s','quantity': 2 } ]}","1.0",true);
//
//print TradeService::ali_pc("1512462141589110","8yxER8gduXkA0tRKbkRv9YlPgN9y6Epb","php_cross_border_ali0", "orderName_php", "orderDetail",
//    "10","NZD","www.baidu.com","www.baidu.com","","",true);

//print TradeService::wx_pc("1512462141589110","8yxER8gduXkA0tRKbkRv9YlPgN9y6Epb","php_cross_border_wx0", "orderName_php", "orderDetail",
//    "10","NZD","1","www.baidu.com","www.baidu.com","",true);

print TradeService::ali_wap("1512462141589110","8yxER8gduXkA0tRKbkRv9YlPgN9y6Epb","php_cross_border_ali06", "orderName_php", "orderDetail",
    "10","NZD","www.baidu.com","www.baidu.com","","",true);