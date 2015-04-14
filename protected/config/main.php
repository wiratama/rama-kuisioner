<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Rama Restaurants Bali',
	
	// set default lang
	'language' => 'en',

	// preloading 'log' component
	'preload'=>array('log'),

	'aliases' => array(
		'bootstrap' => 'ext.yii-bootstrap3',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.behaviors.*',
	    'bootstrap.helpers.*',
	    'bootstrap.widgets.*',
	    'ext.YiiMailer.YiiMailer',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'@arya',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
		
	),

	'behaviors'=>array(
		'runEnd'=>array(
			'class'=>'application.components.WebApplicationEndBehavior',
		),
	),

	// application components
	'components'=>array(
		
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),		

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

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

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
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),

		// added components
		'backendUser'=>array(             
			// Webuser for the admin area (admin)
			'class'=>'application.components.EWebUser',
			// 'loginUrl'=>array('backend/security/login'),
			// 'stateKeyPrefix'=>'_backend',
		),
		'bootstrap' => array(
	        'class' => 'bootstrap.components.BsApi'
	    ),
		'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
		'settings'=>array(
	        'class'             => 'application.components.CmsSettings',
	        'cacheComponentId'  => 'cache',
	        'cacheId'           => 'global_website_settings',
	        'cacheTime'         => 84000,
	        'tableName'     	=> 'settings',
	        'dbComponentId'     => 'db',
	        'createTable'       => true,
	        'dbEngine'      	=> 'InnoDB',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'host'=>'smtp.mandrillapp.com',
		'port'=>'587',
		'apiUser'=>'support@alamaya.com',
		'apiKey'=>'xWwIPfRMNIdrj6qiTk5GCQ',
		'noReply'=>'noreply@ramaquest.com',
	),
);
