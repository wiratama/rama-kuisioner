<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'theme' => 'rama-frontend',
        'components'=>array(
            'urlManager' => array(
                'urlFormat' => 'path',
                // 'showScriptName' => false,
                'rules' => array(
                    'home'=>'site/index',
                    'personaldata'=>'site/personaldata',
                    // 'questioner'=>'site/questioner',
                    'questioner/<page:([A-Za-z0-9-]+)>'=>'site/questioner',
                    /*'<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',*/
				),
			),
			// 'user'=>array(
			// 	// 'class'=>'application.components.EWebUser',
			// 	// enable cookie-based authentication
			// 	'allowAutoLogin'=>true,
			// ),
        )
        // Put front-end settings there
    )
);
?>