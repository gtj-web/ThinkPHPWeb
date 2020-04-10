<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
						'__ADMIN__' => __ROOT__ . '/Public/Admin'
	),
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'th_loneliness',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'th_',    // 

    // 显示跟踪信息
    'SHOW_PAGE_TRACE'       =>		true,
);