<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/11/8
 * Time: 10:03
 */

require_once "../service/RefundService.php";

//print RefundService::refund("xxxxxxxxxxxxxxxxx","xxxxxxxxxxxxx","c20130101712081801070511837","201711008","0.1","php退款测试");

print RefundService::refundQuery("xxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxx","1512462141589110",true);