<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'supershop',          // 数据库名
    'DB_USER'               =>  'kebi',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PORT'               =>  3306,        // 端口

    // 显示页面Trace信息
	'SHOW_PAGE_TRACE' =>true, 


    'TOKEN_ON'     =>   true, //是否开启令牌验证
     'TOKEN_NAME'   =>   'token',// 令牌验证的表单隐藏字段名称
     'TOKEN_TYPE'   =>   'md5',//令牌验证哈希规则

     'MODEL_FIELD_FLAG' => TRUE,//表单加密开关

    'MODEL_FIELD_NAME_PRE' => 'mlm_',//表单加密前缀

    'MODEL_FIELD_EMCODE' => 'md5',//加密方式

    'MODEL_FIELD_EMCODE_KEY' => 'GAD@DFVGFasfdgA'//加密key
);