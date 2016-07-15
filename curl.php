<?php 

function curl_post($url,$post_data){
	// 1. 初始化
	$ch = curl_init();
	// 2. 设置选项，包括URL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 我们在POST数据哦！
	curl_setopt($ch, CURLOPT_POST, 1);
	// 把post的变量加上
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	// 3. 执行并获取HTML文档内容
	$output = curl_exec($ch);
	// 4. 释放curl句柄
	curl_close($ch);
	
	return $output;
}
function curl_get($url){
	// 1. 初始化
	$ch = curl_init();
	// 2. 设置选项，包括URL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 3. 执行并获取HTML文档内容
	$output = curl_exec($ch);
	// 4. 释放curl句柄
	curl_close($ch);

	return $output;
}