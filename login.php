<?php
/**
 * Created by PhpStorm.
 * User: koastal
 * Date: 2016/7/15
 * Time: 11:24
 */
require_once("saeMySQL.php");
session_start();
extract($_POST,EXTR_SKIP);
if(isset($username) && $username!= ''){
    if(isset($password) && $password != ''){
        $mysql = new saeMySQL();
        $sql = "SELECT * FROM user WHERE username='$username'";
        $query = $mysql->query($sql);
        $res = $query->fetch_assoc();
        if(count($res) > 0){
            if($res['password'] == $password){
                //用户验证通过，保存session
                $_SESSION['uid'] = $res['id'];
                $_SESSION['username'] = $res['username'];
                $_SESSION['token'] = md5($_SESSION['uid'].$_SESSION['username']);
                header("Location:index.php");
            }else{
                echo "username or password is wrong.";exit;
            }
        }else{
            echo "username or password is wrong.";exit;
        }
    }else{
        echo "password is null";exit;
    }
}else{
    echo "username is null";exit;
}