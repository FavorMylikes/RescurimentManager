<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'听云 ERP 预录入系统',
	'timeZone'=>'Asia/Chongqing',
	// preloading 'log' component
	'preload'=>array(
        'log',
        'bootstrap',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'booster.*',
		'ext.PHPExcel.*',
		'ext.yii-mail.YiiMailMessage'
	),
    'aliases'=>array(
        'booster' =>  'application.extensions.booster',
		'ext'=>'application.extensions',
    ),
    'language'=>'zh_cn',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class'=>'RWebUser',
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format//重定向规则
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		//Set mail sender config//发送邮件的
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType'=>'smtp',
			'transportOptions'=>array(
				'host'=>'smtp.163.com',
				'username'=>'favormylikes@163.com',
				'password'=>'l786112323',
				'port'=>'25',
			),
			'viewPath' => 'application.views.mail',
		),
        'bootstrap' =>  array(
            'class' =>  'booster.components.Booster',
        ),
        'booster'=>array(
            'class'=>'booster.components.Booster',
        ),
		'db'=>include(dirname(__FILE__).DIRECTORY_SEPARATOR."../data/db.php"),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
//					'levels' => 'trace', //级别为trace
//					'categories' => 'system.db.*'//用于查看数据库执行的语句
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);