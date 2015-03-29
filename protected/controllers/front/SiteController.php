<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
		
		$model=new SurveyStore;
		if(isset($_POST['SurveyStore']))
		{
			$model->attributes=$_POST['SurveyStore'];
			$model->validate();
			$date=date('d-m-Y-H-i-s');
			$unique=$model->struk_number.'_'.$date;
			Yii::app()->session['init']=$unique;
			Yii::app()->session[$unique]=array(
				'store'=>array(
					'store_number'=>$model->store_number,
					'date_survey'=>$model->date_survey,
					'struk_number'=>$model->struk_number,
				),
			);
			$this->redirect(array('personaldata'));
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionPersonaldata()
	{
		$model=new Customer;

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			$model->validate();
			Yii::app()->session[Yii::app()->session['init']]=array(
				'store'=>array(
					'store_number'=>Yii::app()->session[Yii::app()->session['init']]['store']['store_number'],
					'date_survey'=>Yii::app()->session[Yii::app()->session['init']]['store']['date_survey'],
					'struk_number'=>Yii::app()->session[Yii::app()->session['init']]['store']['struk_number'],
				),
				'personaldata'=>array(
					'name'=>$model->name,
					'address'=>$model->address,
					'contact'=>$model->contact,
					'nationality'=>$model->nationality,
					'email'=>$model->email,
				),
				'survey'=>array(
				),
			);
			$this->redirect(array('questioner'));
		}

		$this->render('personaldata',array(
			'model'=>$model,
		));
	}

	public function actionQuestioner()
	{
		$page = (isset($_GET['page']) ? $_GET['page'] : 1);
		$limit = 5;
		$offset = ($page-1)*$limit;
        
        $model=Question::model()->with('answer')->findAll(array(
		    'limit' => $limit,
		    'offset' => $offset,
		));

		if (isset($_POST['questioner']))
		{
			foreach ($_POST['questioner'] as $keyquestioner => $questioner) {
				var_dump($questioner['answer']);
				if (isset($questioner['reason'][$questioner['answer']])) {
					var_dump($questioner['reason'][$questioner['answer']]);
				} else {
					var_dump('null');
				}				
			}
			die();
		}

		$this->render('questioner',array(
			'model'=>$model,
		));
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}