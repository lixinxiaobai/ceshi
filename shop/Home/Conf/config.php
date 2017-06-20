<?php
return array(
	//'配置项'=>'配置值'
	// 'HTML_CACHE_ON' => true, // 开启静态缓存
 //    'HTML_CACHE_TIME' => 60, // 全局静态缓存有效期（秒）
 //    'HTML_FILE_SUFFIX' => '.aaa', // 设置静态缓存文件后缀
 //    'HTML_CACHE_RULES' => array( // 定义静态缓存规则
	// // 定义格式1 数组方式
	// 	'Goods:detail' => '{$_GET.id}',
	// )

	'URL_ROUTER_ON' => true, // 开启路由
	//  '路由表达式'=>'路由地址和传入参数'

	'URL_ROUTE_RULES'=> array(
		'detail/:id' => 'Home/Goods/detail'
	)

);