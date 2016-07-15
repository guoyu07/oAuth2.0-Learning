<?php
/**
 * Created by PhpStorm.
 * User: koastal
 * Date: 2016/7/15
 * Time: 8:52
 */
$signature = $_GET['signature'];
$timestamp = $_GET['timestamp'];
$rand = $_GET['rand'];
$token = "ae609af797e0001f";
$arr = array($token,$timestamp,$rand);
sort($arr);
$str = implode($arr);
$sign = sha1($str);
if($sign == $signature){
    echo sha1($token);
}else{
    echo "error";
}
