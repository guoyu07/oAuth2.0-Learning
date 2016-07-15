<?php
session_start();
include_once( 'config.php' );
header("Content-type:text/html;charset='utf-8'");

if(isset($_SESSION['token'])){
	echo "<p>您已登录，用户信息如下：</p>";
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
	echo '<br/><a href="logout.php">Logout</a>';
}else{
	$param['client_id'] = WB_AKEY;
	$param['redirect_uri'] = WB_CALLBACK_URL;
	$param['response_type'] = "code";
	$param = http_build_query($param);
	$url = WB_AUTHORIZE_URL."?".$param;
	?>
	<div class="login">
		<form action="login.php" method="post">
			<p>username: <input type="text" name="username"></p>
			<p>password: <input type="password" name="password"></p>
			<p><input type="submit" value="submit"></p>
		</form>
	</div>
	<p>
		<a href="<?php echo $url;?>">
			<img src="http://www.sinaimg.cn/blog/developer/wiki/32.png" />
		</a>
	</p>
	<p>
		<a href="qqlogin.php">
			<img src="http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/img/Connect_logo_5.png" />
		</a>
	</p>
	<?php
}
?>