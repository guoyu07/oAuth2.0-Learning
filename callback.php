<?php
	session_start();
	require_once('config.php');
	require_once('curl.php');
	require_once('saeMySQL.php');
	header("Content-type:text/html;charset=utf-8");
	$param = array();
	if(isset($_REQUEST['code'])){
		$param['code'] = $_REQUEST['code'];
		$param['client_id'] = WB_AKEY;
		$param['client_secret'] = WB_SKEY;
		$param['grant_type'] = "authorization_code";
		$param['redirect_uri'] = WB_CALLBACK_URL;
		$param = http_build_query($param);
		$url = WB_ACCESS_TOKEN_URL;
		$res = curl_post($url,$param);
		$token = json_decode($res,true);
		$uid = $token['uid'];	//授权后的uid
		$access_token = $token['access_token'];	//授权获得access_token
		//使用请求再次获得uid
		$url = WB_GET_TOKEN_INTO;
		$param = array();
		$param['access_token'] = $access_token;
		$param = http_build_query($param);
		$res = curl_post($url,$param);
		$res = json_decode($res,true);
		$real_uid = $res['uid'];
		if($real_uid == $uid && $uid != ''){
			//验证成功，查询账户
			$mysql = new saeMySQL();
			$sql = "SELECT * FROM user WHERE weibo='$uid'";
			$query = $mysql->query($sql);
			$res = $query->fetch_assoc();
			if($res){
				//登入本地账户
				$_SESSION['uid'] = $res['id'];
				$_SESSION['username'] = $res['username'];
				$_SESSION['token'] = md5($_SESSION['uid'].$_SESSION['username']);
				header("Location:index.php");
			}else{
				echo "$uid<hr/>微博账户尚未绑定本地用户。";
			}
		}else{
			//验证失败，给出提示
			echo "登陆失败";
		}
	}
	
