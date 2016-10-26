<?php
return array(
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '114.55.28.52', // 服务器地址
	'DB_NAME'   => 'aastory', // 数据库名
	'DB_USER'   => 'aastory', // 用户名
	'DB_PWD'    => 'aastory@admin', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'aas_', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

	'URL_MODEL' => 0,
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'=>array(
			'__MAIN_HOST__'=>'http://www.ananinfo.cm',
			'__WAP_HOST__'=>'http://m.ananinfo.cm',
			'__MYBoots__' => '/Application/Static/Public/vendors/triangle',
			//'__UPLOAD__' => './../ananinfo_system',

	),
	//'URL_HTML_SUFFIX'	=> '.shtml', //设置静态缓存文件后缀
    'ALIDAYU_API_APPKEY'=> '23464624',
    'ALIDAYU_API_SECRET'=> 'd619ef8330e2252d2d1924a74687f074',
);