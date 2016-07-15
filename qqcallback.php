<?php
/**
 * Created by PhpStorm.
 * User: koastal
 * Date: 2016/7/15
 * Time: 15:20
 * QQ登陆回调页面
 */
require_once("QQAPI/qqConnectAPI.php");
require_once('config.php');
require_once('curl.php');
require_once('saeMySQL.php');
header("Content-type:text/html;charset=utf-8");
$param = array();
$qc = new QC();
$res = $qc->qq_callback();
$param['access_token'] = $res['access_token'];
$res = $qc->get_openid();
$openid = $res->openid;
$param['openid'] = $openid;
$param['appid'] = $qc->get_appid();

$mysql = new saeMySQL();
$sql = "SELECT * FROM user WHERE qq='$openid'";
$query = $mysql->query($sql);
$res = $query->fetch_assoc();
if($res){
    //登入本地账户
    $_SESSION['uid'] = $res['id'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['token'] = md5($_SESSION['uid'].$_SESSION['username']);
    header("Location:index.php");
}else{
    echo "$openid<hr/>微博账户尚未绑定本地用户。";
}
?>
<p><a href="logout.php">logout</a></p>



