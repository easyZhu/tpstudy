1.框架启动文件
```````````````
start_for_win.bat  ---window环境下的启动文件  直接点击启动

start.php  ---liunx环境下的启动文件  命令行php start.php 启动 php start.php -d 则为守护进程方式启动
```````````````

2.框架核心目录以及核心文件
```````````````
src----|
	   |Channel_server.php ---进程间通信的组件，相当于搭建了websocket进程和http进程的桥梁中间进程

   ----|
	   |Http_server.php ---开启http服务进程，相当于开启了http服务器可以接收外部应用发来的http请求

   ----|
	   |Ws_server.php ---开启websocket服务进程，这个文件可以接收由http_server进程
						   通过channel进程发送过来的请求...
						   
```````````````						   
3.框架与外部应用如何结合？
```````````````
		curl				channel_server					     curl          ws
外部应用----->Http_server.php--------------->Ws_server.php------->外部应用+连接上websocket的静态页面

```````````````
4.外部应用
```````````````
外部应用则为你的项目，你的项目可以不需要放在此框架内，
此框架就是为了避免外部应用整合workerman而做出的分离，以及避免ws数据包的暴露，这里的app目录则为外部应用的模拟，
可以随意放置。
```````````````
5.框架可以随意拓展，
```````````````
可拓展src的http_pusher.php以及ws_pusher
```````````````