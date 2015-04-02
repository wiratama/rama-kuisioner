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
		
		// Yii::app()->session->destroy();
		$model=new SurveyStore;
		if(isset($_POST['SurveyStore']))
		{
			$model->attributes=$_POST['SurveyStore'];
			$model->validate();

			// unique session id untuk init
			$date=date('d-m-Y-H-i-s');
			$unique=$model->struk_number.'_'.$date;
			Yii::app()->session['init']=$unique;
			
			// define data ke session
			Yii::app()->session[Yii::app()->session['init']]=array(
				'store'=>array(
					'store_number'=>$model->store_number,
					'date_survey'=>$model->date_survey,
					'struk_number'=>$model->struk_number,
				),
			);

			// redirect ke page berikutnya
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
			
			// push data ke session
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
				'survey'=>array(),
			);

			// redirect ke page berikutnya
			Yii::app()->request->redirect(
				Yii::app()->createAbsoluteUrl('site/questioner',
					array(
						'page'=>1,
					)
			));
		}

		$this->render('personaldata',array(
			'model'=>$model,
		));
	}

	public function actionQuestioner()
	{
		// get page param dari url
		$page = (isset($_GET['page']) ? $_GET['page'] : 1);
		
		// set limit & offset
		$limit = 5;
		$offset = ($page-1)*$limit;
        
        // load questioner per page
        $model=Question::model()->with('answer')->findAll(array(
		    'limit' => $limit,
		    'offset' => $offset,
		));

        // count data quistioner
		$rowData=Question::model()->with('answer')->findAll();

        // data max page
		$maxPage=ceil(count($rowData)/5);
		
		// last questioner ? load comment
		$comment=false;
		if ($page==$maxPage) {
			$comment=true;
		}
		
		// progress percentage
		$progress=(($page+2)/($maxPage+2))*100;

		if (isset($_POST['questioner']))
		{
			// pilih data answer+reason berdasarkan question
			$answer=array();
			foreach ($_POST['questioner'] as $keyquestioner => $questioner) {
				if (isset($questioner['jenis_input']) and $questioner['jenis_input']=='radio') {
					if (isset($questioner['reason'][$questioner['answer']])) {
						$reason=$questioner['reason'][$questioner['answer']];
					} else {
						$reason=null;
					}

					$answer[$keyquestioner]=array(
						'id_question'=>$keyquestioner,
						'id_answer'=>$questioner['answer'],
						'reason'=>$reason,
					);
				} else {
					foreach($questioner['answer'] as $keycheckanswer=>$itemcheckanswer) {
						if(isset($questioner['reason'][$itemcheckanswer])) {
							$reason=$questioner['reason'][$itemcheckanswer];
						} else {
							$reason=null;
						}

						$answer[$keyquestioner][]=array(
							'id_question'=>$keyquestioner,
							'id_answer'=>$itemcheckanswer,
							'reason'=>$reason,
						);
					}
				}
			}

			// push data ke session yg sudah ada
			$data['survey']=$answer;
			array_push($_SESSION[Yii::app()->session['init']]['survey'],$answer);
			
			// redirect ke page berikutnya
			if ($page < $maxPage) {
				Yii::app()->request->redirect(
					Yii::app()->createAbsoluteUrl('site/questioner',
						array(
							'page'=>$page+1,
						)
				));
			} else {
				echo "<pre>";
				foreach(Yii::app()->session[Yii::app()->session['init']]['survey'] as $keyarray=>$surveyarray) {
					foreach ($surveyarray as $keydata => $surveydata) {
						// var_dump($surveydata);
						// var_dump($this->is_multi($surveydata));
						if ($this->is_multi($surveydata)) {
							
						}
						/*foreach ($surveydata as $keyitem => $surveyitem) {
							if (!is_array($surveyitem)) {
								var_dump(Yii::app()->session[Yii::app()->session['init']]['store']['store_number']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['store']['date_survey']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['store']['struk_number']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['name']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['address']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['contact']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['nationality']);
								var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['email']);
								var_dump($keyitem);
								var_dump($surveyitem);
							} else {
								foreach ($surveyitem as $keysubitem => $surveysubitem) {
									var_dump(Yii::app()->session[Yii::app()->session['init']]['store']['store_number']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['store']['date_survey']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['store']['struk_number']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['name']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['address']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['contact']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['nationality']);
									var_dump(Yii::app()->session[Yii::app()->session['init']]['personaldata']['email']);
									var_dump($keysubitem);
									var_dump($surveysubitem);
								}
							}
						}*/
					}
				}
				echo "<pre>";
				die();
			}
		}

		$this->render('questioner',array(
			'model'=>$model,
			'progress'=>$progress,
			'comment'=>$comment,
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

	// helper
	function is_multi($array) {
	    $rv = array_filter($array,'is_array');
	    if(count($rv)>0) return true;
	    return false;
	}

	function is_multi2($array) {
	    foreach ($array as $v) {
	        if (is_array($v)) return true;
	    }
	    return false;
	}

	function is_multi3($array) {
	    $c = count($array);
	    for ($i=0;$i<$c;$i++) {
	        if (is_array($a[$i])) return true;
	    }
	    return false;
	}
}