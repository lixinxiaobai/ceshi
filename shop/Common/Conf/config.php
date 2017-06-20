<?php
return array(
	//'配置项'=>'配置值'
	'URL_CASE_INSENSITIVE' => true, // 代表URL不区分大小写
    //'URL_MODEL' => 0, // 普通模式
    // 'URL_MODEL' => 1, // PATHINFO模式
    'URL_MODEL' => 2, // rewrite重写模式
    // 'URL_MODEL' => 3, // 兼容模式

    // 'MODULE_DENY_LIST' => array('Admin'),
    'MODULE_ALLOW_LIST' => array('Home','Admin'), // 设置允许访问的模块
    'DEFAULT_MODULE' => 'Home', // 设置默认模块  通过这个配置和上面的配置，可以隐藏掉Home

    
	
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'shop1',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'shop_',    		// 数据库表前缀	
);