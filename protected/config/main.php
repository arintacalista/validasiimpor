<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sistem Aplikasi Validasi Data Impor',
	'defaultController'=>'site/index',

	// preloading 'log' component
	'preload' => array('chosen', 'log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.bootstrap.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
            	'ext.bootstrap.gii', // Since 0.9.1
        	),
		),

	),

	// application components
	'components'=>array(
		'chosen' => ['class' => 'ext.chosen.Chosen'],
        'user'=>array(
			// enable cookie-based authentication
		'class'=>'application.components.EWebUser',
		'allowAutoLogin'=>true,
		),
		'bootstrap'=>array('class'=>'ext.bootstrap.components.Bootstrap'),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>require(dirname(__FILE__).'/database.php'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				// array(
				// 	'class'=>'CFileLogRoute',
				// 	'levels'=>'error, warning',
                // ),
				// uncomment the following to show log messages on web pages
				[
					'class' => 'CWebLogRoute',
                    'categories' => 'system.db.*',
                    'enabled' => YII_DEBUG,
				],
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
