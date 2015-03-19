<?php
return CMap::mergeArray(
		require(dirname(__FILE__) . '/main.php'), array(
			'theme' => 'rama-backend',
			'components' => array(
				'urlManager' => array(
					'urlFormat' => 'path',
					// 'showScriptName' => false,
					'rules' => array(
						'/' => 'site/login',
						'backend' => 'site/login',
						'backend/<_c>' => '<_c>',
						'backend/<_c>/<_a>' => '<_c>/<_a>',
					),
				),
				// 'backendUser'=>array(             
				// 	// Webuser for the admin area (admin)
				// 	'class'=>'application.components.EWebUser',
				// 	// 'loginUrl'=>array('backend/security/login'),
				// 	// 'stateKeyPrefix'=>'_backend',
				// ),
			)
		)
);
?>