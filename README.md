# oAuth2.0-Learning

##项目说明

最近有时间，就看了一下社交账号接入功能，现在基本上使用的都是OAuth2.0协议。

我在CSDN上写了两篇介绍社交账号接入的文章，可以参考看下

[OAuth2.0的学习和实践](http://blog.csdn.net/koastal/article/details/50282509)

[Oauth2.0 获得access_token以后](http://blog.csdn.net/koastal/article/details/51899031)

该系统可以使用本地账户，QQ账户，微博账户三种方式登录。
用户信息表存放在user表中，详见app_ustclibiary.sql

##目录介绍

QQAPI是用户QQ登录的类库文件，使用QQ官方SDK生成。
saetv2.ex.class.php是微博登录需要引入的类库文件。
saeMySQL.php是继承自mysqli的一个扩展类，自己编写的，便于数据库的操作。
callback.php是微博登录的回调地址
qqcallback.php是QQ登录的回调地址

##部署说明

1. 导入数据表
2. 申请微博和QQ的appid以及appkey参数
3. 正确填写相关回调地址。
4. QQ登录需要的appid和appkey可以直接在QQAPI/comm/inc.php里面修改
5. 微博登录需要的appid和appkey可以直接在config.php中修改