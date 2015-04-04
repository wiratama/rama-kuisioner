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
			
			$customer=Customer::model()->findByAttributes(array('email'=>$model->email));
			if ($customer!=null) {
				$surveyquestionanswerdata=SurveyQuestionAnswer::model()->findAllByAttributes(array('store_number'=>Yii::app()->session[Yii::app()->session['init']]['store']['store_number'],'id_customer'=>$customer->id_customer));
				$surveyquestionanswer=count($surveyquestionanswerdata);
			} else {
				$surveyquestionanswer=0;
			}

			//  check apakah sudah pernah melakukan survey atau belum
			if(0 >= $surveyquestionanswer) {
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
					// 'comment'=>array(),
				);
			} else {
				Yii::app()->user->setFlash("frontend-form","Oops ! You've filled out a questionnaire for this store");
				$this->refresh();
			}

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
		$progress=(($page+2)/($maxPage+3))*100;

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
					if(is_array($questioner)) {
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
				// var_dump(Yii::app()->session[Yii::app()->session['init']]);
				// die();

				$member=Customer::model()->findByAttributes(array('email'=>Yii::app()->session[Yii::app()->session['init']]['personaldata']['email']));
				if ($member==null) {
					$customer=new Customer;
					$customer->name=Yii::app()->session[Yii::app()->session['init']]['personaldata']['name'];
					$customer->address=Yii::app()->session[Yii::app()->session['init']]['personaldata']['address'];
					$customer->contact=Yii::app()->session[Yii::app()->session['init']]['personaldata']['contact'];
					$customer->nationality=Yii::app()->session[Yii::app()->session['init']]['personaldata']['nationality'];
					$customer->email=Yii::app()->session[Yii::app()->session['init']]['personaldata']['email'];
					
					if($customer->save()) {
						$surveystore=new SurveyStore;
						$surveystore->store_number=Yii::app()->session[Yii::app()->session['init']]['store']['store_number'];
						$surveystore->date_survey=Yii::app()->session[Yii::app()->session['init']]['store']['date_survey'];
						$surveystore->struk_number=Yii::app()->session[Yii::app()->session['init']]['store']['struk_number'];

						if ($surveystore->save()) {
							foreach(Yii::app()->session[Yii::app()->session['init']]['survey'] as $keyarray=>$surveyarray) {
								foreach ($surveyarray as $keydata => $surveydata) {
									if ($this->is_multi($surveydata)) {
										foreach($surveydata as $keyitem=>$surveyitem) {
											$model=new SurveyQuestionAnswer;
											$model->store_number=$surveystore->store_number;
											$model->id_customer=$customer->id_customer;
											$model->id_question=$surveyitem['id_question'];
											$model->id_answer=$surveyitem['id_answer'];
											$model->reason=$surveyitem['reason'];
											$model->save();
										}
									} else {
										$model=new SurveyQuestionAnswer;
										$model->store_number=$surveystore->store_number;
										$model->id_customer=$customer->id_customer;
										$model->id_question=$surveydata['id_question'];
										$model->id_answer=$surveydata['id_answer'];
										$model->reason=$surveydata['reason'];
										$model->save();
									}
								}
							}
						}

						$id_customer=$customer->id_customer;

						if (isset($_POST['comment'])) {
							$comment=new Comment;
							$comment->id_customer=$customer->id_customer;
							$comment->store_number=$surveystore->store_number;
							$comment->comment=htmlspecialchars($_POST['comment']);
						}

						$member=Customer::model()->findByPk($id_customer);
						$valCode=implode("",$this->getNumbers(1,99,5,1));
						$member->validation_number=$valCode;
						Yii::app()->session['codevalidasi']=$valCode;
						$member->save();

						/*$mail = new YiiMailer();
						$mail->IsSMTP();
						$mail->Host = Yii::app()->params['host'];
						$mail->Port = Yii::app()->params['port'];
						$mail->SMTPAuth = true;
						$mail->Username = Yii::app()->params['apiUser'];
						$mail->Password = Yii::app()->params['apiKey'];
						$mail->IsHTML(true);
						$mail->setFrom(Yii::app()->params['noReply']);
						$mail->setSubject(Yii::app()->name.' Validation Code');
						$mail->setTo($customer->email);
						$mail->setView('kodevalidasimail');
						$mail->setData(array(
							'validation_number' => $member->validation_number,
							'name' => $customer->name,
							'address' => $customer->address,
							'contact' => $customer->contact,
							'nationality' => $customer->nationality,
							'email' => $customer->email,
							'store_number' => $surveystore->store_number,
							'date_survey' => $surveystore->date_survey,
							'struk_number' => $surveystore->struk_number,
						));
						$mail->setLayout('noneLayout');
						$mail->send();*/
					}
				} else {
					$surveystore=new SurveyStore;
					$surveystore->store_number=Yii::app()->session[Yii::app()->session['init']]['store']['store_number'];
					$surveystore->date_survey=Yii::app()->session[Yii::app()->session['init']]['store']['date_survey'];
					$surveystore->struk_number=Yii::app()->session[Yii::app()->session['init']]['store']['struk_number'];
					$surveystore->save();

					if ($surveystore->save()) {
						foreach(Yii::app()->session[Yii::app()->session['init']]['survey'] as $keyarray=>$surveyarray) {
							foreach ($surveyarray as $keydata => $surveydata) {
								if ($this->is_multi($surveydata)) {
									foreach($surveydata as $keyitem=>$surveyitem) {
										$model=new SurveyQuestionAnswer;
										$model->store_number=$surveystore->store_number;
										$model->id_customer=$member['id_customer'];
										$model->id_question=$surveyitem['id_question'];
										$model->id_answer=$surveyitem['id_answer'];
										$model->reason=$surveyitem['reason'];
										$model->save();
									}
								} else {
									$model=new SurveyQuestionAnswer;
									$model->store_number=$surveystore->store_number;
									$model->id_customer=$member['id_customer'];
									$model->id_question=$surveydata['id_question'];
									$model->id_answer=$surveydata['id_answer'];
									$model->reason=$surveydata['reason'];
									$model->save();
								}
							}
						}
					}

					$id_customer=$member['id_customer'];

					if (isset($_POST['comment'])) {
						var_dump($_POST['comment']);
						die();
						$comment=new Comment;
						$comment->id_customer=$member['id_customer'];
						$comment->store_number=$surveystore->store_number;
						$comment->comment=htmlspecialchars($_POST['comment']);
					}

					$member=Customer::model()->findByPk($id_customer);
					$valCode=implode("",$this->getNumbers(1,99,5,1));
					$member->validation_number=$valCode;
					Yii::app()->session['codevalidasi']=$valCode;
					$member->save();

					/*$mail = new YiiMailer();
					$mail->IsSMTP();
					$mail->Host = Yii::app()->params['host'];
					$mail->Port = Yii::app()->params['port'];
					$mail->SMTPAuth = true;
					$mail->Username = Yii::app()->params['apiUser'];
					$mail->Password = Yii::app()->params['apiKey'];
					$mail->IsHTML(true);
					$mail->setFrom(Yii::app()->params['noReply']);
					$mail->setSubject(Yii::app()->name.' Validation Code');
					$mail->setTo($customer->email);
					$mail->setView('kodevalidasimail');
					$mail->setData(array(
						'validation_number' => $member->validation_number,
						'name' => $customer->name,
						'address' => $customer->address,
						'contact' => $customer->contact,
						'nationality' => $customer->nationality,
						'email' => $customer->email,
						'store_number' => $surveystore->store_number,
						'date_survey' => $surveystore->date_survey,
						'struk_number' => $surveystore->struk_number,
					));
					$mail->setLayout('noneLayout');
					$mail->send();*/
				}
				
				$this->redirect(array('codevalidasi'));
				// die();
			}
		}

		$this->render('questioner',array(
			'model'=>$model,
			'progress'=>$progress,
			'comment'=>$comment,
		));
	}

	public function actionCodevalidasi($value='')
	{
		// progress percentage
		$progress=100;
		$codval=Yii::app()->session['codevalidasi'];
		Yii::app()->session->destroy();
		$this->render('kodevalidasi',array(
			'progress'=>$progress,
			'codevalidasi'=>$codval,
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
	        if (is_array($array[$i])) return true;
	    }
	    return false;
	}

	function getNumbers($min=1,$max=10,$count=1,$margin=0) {
	    $range = range(0,$max-$min);
	    $return = array();
	    for( $i=0; $i<$count; $i++) {
	        if( !$range) {
	            trigger_error("Not enough numbers to pick from!",E_USER_WARNING);
	            return $return;
	        }
	        $next = rand(0,count($range)-1);
	        $return[] = $range[$next]+$min;
	        array_splice($range,max(0,$next-$margin),$margin*2+1);
	    }
	    return $return;
	}
}