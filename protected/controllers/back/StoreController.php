<?php

class StoreController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','admin','delete','expexcel'),
				'expression'=>'!Yii::app()->backendUser->isGuest',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$skor=0;
		$model=$this->loadModel($id);
		$surveystore=SurveyStore::model()->findAllByAttributes(array('store_number'=>$model->store_number));
		foreach ($surveystore as $keysurveystore => $surveystoreitem) {
			$surveyquestionanswer=SurveyQuestionAnswer::model()->findAllByAttributes(array('id_survey_store'=>$surveystoreitem->id_survey_store));
			foreach ($surveyquestionanswer as $keysuerveyquestionanswer=>$surveyquestionanswer) {
				$answer=Answer::model()->findByPk($surveyquestionanswer->id_answer);
				$skor+=$answer->skor;
			}
		}

		$sqa=SurveyQuestionAnswer::model()->surveyCounterData($id);
		$sqar=SurveyQuestionAnswer::model()->surveyReasonData($id);
		
		$id_question=null;
		$sqar_id_question=null;
		$sqar_question=null;
		$reason=null;
		$count_reason=null;

		$sqadata=array();
		$surveyitem=array();
		
		$reasonitem=array();
		$reasondata=array();
		foreach ($sqar as $sqarkey=>$sqaritem) {
			if ($sqar_id_question!=$sqaritem['id_question']) {
				$sqar_id_question=$sqaritem['id_question'];
				$sqar_question=$sqaritem['question'];

				if (empty($reason)) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				} else if ($reason!=$sqaritem['reason']) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				}
				$reasonitem=array(
					'reason'=>$reason,
					'count_reason'=>$count_reason,
				);

				$reasondata[$sqaritem['id_question']]=array(
					'question'=>$sqaritem['question'],
					'reasonitem'=>array(
						$reasonitem,
					),
				);

			} else {
				$sqar_id_question=$sqaritem['id_question'];
				$sqar_question=$sqaritem['question'];

				if (empty($reason)) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				} else if ($reason!=$sqaritem['reason']) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				}
				$reasonitem=array(
					'reason'=>$reason,
					'count_reason'=>$count_reason,
				);

				array_push($reasondata[$sqaritem['id_question']]['reasonitem'], $reasonitem);
			}
		}
		
		// format struktur array
		foreach ($sqa as $sqakey=>$sqaitem) {
			if ($id_question==null) {
				$id_question=$sqaitem['id_question'];
			} else if ($id_question!=$sqaitem['id_question']) {
				$id_question=$sqaitem['id_question'];
			}
			$sqadata[$id_question][]=array(
				'id_answer'=>$sqaitem['id_answer'],
				'count_answer'=>$sqaitem["count_answer"],
			);
		}

		// get data
		foreach ($sqadata as $datakey => $data) {
			$answerdata=array();
			$question=Question::model()->findByPk($datakey);
			
			foreach ($data as $dkey=>$ditem) {
				$answer=Answer::model()->with(array(
					'answer_desc'=>array('condition'=>'answer_desc.id_language = 1')
				))->findByPk($ditem['id_answer']);


				foreach($answer['answer_desc'] as $dsckey=>$descitem) {
					$answerdata[]=array(
						'answer'=>$descitem['answer'],
						'count_answer'=>$ditem['count_answer'],
					);
				}				
			}

			$surveyitem[]=array(
				'question'=>$question['question'],
				'answerdata'=>$answerdata,
			);		
		}

		$this->render('view',array(
			'model'=>$model,
			'skor'=>$skor,
			'surveyitem'=>$surveyitem,
			'reasondata'=>$reasondata,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Store;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Store']))
		{
			$model->attributes=$_POST['Store'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->store_number));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Store']))
		{
			$model->attributes=$_POST['Store'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->store_number));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Store');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Store('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Store']))
			$model->attributes=$_GET['Store'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Store the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Store::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionExpexcel()
	{	
		$store=(string)$_GET['store'];
		$comment=Comment::model()->with('member')->findAllByAttributes(array('store_number'=>$store));
		$datacomment=array();
		foreach ($comment as $cmtkey => $cmt) {
			$datacomment[]=array($cmt['comment'],$cmt['member']['name']);
		}

		$sqa=SurveyQuestionAnswer::model()->surveyCounterData($store);
		$sqar=SurveyQuestionAnswer::model()->surveyReasonData($store);
		
		$id_question=null;
		$sqar_id_question=null;
		$sqar_question=null;
		$reason=null;
		$count_reason=null;

		$sqadata=array();
		$surveyitem=array();
		
		$reasonitem=array();
		$reasondata=array();
		foreach ($sqar as $sqarkey=>$sqaritem) {
			if ($sqar_id_question!=$sqaritem['id_question']) {
				$sqar_id_question=$sqaritem['id_question'];
				$sqar_question=$sqaritem['question'];

				if (empty($reason)) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				} else if ($reason!=$sqaritem['reason']) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				}
				$reasonitem=array(
					'reason'=>$reason,
					'count_reason'=>$count_reason,
				);

				$reasondata[$sqaritem['id_question']]=array(
					'question'=>$sqaritem['question'],
					'reasonitem'=>array(
						$reasonitem,
					),
				);

			} else {
				$sqar_id_question=$sqaritem['id_question'];
				$sqar_question=$sqaritem['question'];

				if (empty($reason)) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				} else if ($reason!=$sqaritem['reason']) {
					$reason=$sqaritem['reason'];
					$count_reason=$sqaritem['count_reason'];
				}
				$reasonitem=array(
					'reason'=>$reason,
					'count_reason'=>$count_reason,
				);

				array_push($reasondata[$sqaritem['id_question']]['reasonitem'], $reasonitem);
			}
		}
		
		// format struktur array
		foreach ($sqa as $sqakey=>$sqaitem) {
			if ($id_question==null) {
				$id_question=$sqaitem['id_question'];
			} else if ($id_question!=$sqaitem['id_question']) {
				$id_question=$sqaitem['id_question'];
			}
			$sqadata[$id_question][]=array(
				'id_answer'=>$sqaitem['id_answer'],
				'count_answer'=>$sqaitem["count_answer"],
			);
		}

		// get data
		foreach ($sqadata as $datakey => $data) {
			$answerdata=array();
			$question=Question::model()->findByPk($datakey);
			
			foreach ($data as $dkey=>$ditem) {
				$answer=Answer::model()->with(array(
					'answer_desc'=>array('condition'=>'answer_desc.id_language = 1')
				))->findByPk($ditem['id_answer']);


				foreach($answer['answer_desc'] as $dsckey=>$descitem) {
					$answerdata[]=array(
						'answer'=>$descitem['answer'],
						'count_answer'=>$ditem['count_answer'],
					);
				}				
			}

			$surveyitem[]=array(
				'question'=>$question['question'],
				'answerdata'=>$answerdata,
			);		
		}

		$phpExcelPath = Yii::getPathOfAlias('ext.phpexcel');
		spl_autoload_unregister(array('YiiBase','autoload'));
		include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

		$objectToExport = new PHPExcel();
		
		// comment
		$objectToExport->setActiveSheetIndex(0)->setCellValue('A1', 'Comment')->setCellValue('B1', 'Name');
		$styleArray = array(
			'font'  => array(
				'bold'  => true,
				// 'color' => array('rgb' => 'FF0000'),
				'size'  => 12,
				'name'  => 'Arial'
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'startcolor' => array(
					'rgb' => '87D37C',
				),
			),
		);
		$objectToExport->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
		$objectToExport->getActiveSheet()->getColumnDimension('A')->setWidth(70);
		$objectToExport->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objectToExport->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objectToExport->getActiveSheet()->fromArray($datacomment, null, 'A2');	 
		$objectToExport->getActiveSheet()->setTitle('Comment');
		$objectToExport->createSheet();

		// survey
		$q=2; $a=2;	$r=2;
		$objectToExport->setActiveSheetIndex(1);
		$objectToExport->getActiveSheet()->getColumnDimension('A')->setWidth(60);
		$objectToExport->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objectToExport->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objectToExport->getActiveSheet()->setCellValue('A1', 'Question')->setCellValue('B1', 'Answer')->setCellValue('C1', 'Result');
		$objectToExport->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
		$objectToExport->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objectToExport->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
		
		foreach ($surveyitem as $surveykey=>$survey) {
			if($a > 2 && $r > 2) {
				$a+=1;
				$r+=1;
			}

			$objectToExport->getActiveSheet()->getStyle('A'.$q)->applyFromArray(array(
					'font'  => array(
						'bold'  => false,
						'color' => array('rgb' => 'F0677C'),
						'name'  => 'Arial'
					),
				)
			);
			$objectToExport->getActiveSheet()->setCellValue('A'.$q, $survey['question']);
			
			foreach ($survey['answerdata'] as $keyans=>$ans) {
				$objectToExport->getActiveSheet()->setCellValue('B'.$a, $ans['answer']);
				$a++;
			}
			
			foreach ($survey['answerdata'] as $keyans=>$ans) {
				$objectToExport->getActiveSheet()->setCellValue('C'.$r, $ans['count_answer']);
				$r++;
			}
			$q=($a+1);
		} 
		
		$objectToExport->getActiveSheet()->setTitle('Survey');
		$objectToExport->createSheet();

		// reason
		$q=2; $a=2;	$r=2;
		$objectToExport->setActiveSheetIndex(2);
		$objectToExport->getActiveSheet()->getColumnDimension('A')->setWidth(60);
		$objectToExport->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objectToExport->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objectToExport->getActiveSheet()->setCellValue('A1', 'Question')->setCellValue('B1', 'Reason')->setCellValue('C1', 'Result');
		$objectToExport->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
		$objectToExport->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
		$objectToExport->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
		
		foreach ($reasondata as $reasonkey=>$reason) {
			if($a > 2 && $r > 2) {
				$a+=1;
				$r+=1;
			}

			$objectToExport->getActiveSheet()->getStyle('A'.$q)->applyFromArray(array(
					'font'  => array(
						'bold'  => false,
						'color' => array('rgb' => 'F0677C'),
						'name'  => 'Arial'
					),
				)
			);
			$objectToExport->getActiveSheet()->setCellValue('A'.$q, $reason['question']);
			
			foreach ($reason['reasonitem'] as $keyans=>$res) {
				$objectToExport->getActiveSheet()->setCellValue('B'.$a, $res['reason']);
				$a++;
			}

			foreach ($reason['reasonitem'] as $keyans=>$res) {
				$objectToExport->getActiveSheet()->setCellValue('C'.$r, $res['count_reason']);
				$r++;
			}
			$q=($a+1);
		} 
		
		$objectToExport->getActiveSheet()->setTitle('Reason');
		$objectToExport->createSheet();

		$objectToExport->setActiveSheetIndex(0);
		 
		ob_end_clean();
		ob_start();
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="report-survey.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objectToExport, 'Excel5');
		$objWriter->save('php://output');

		// Once we have finished using the library, give back the power to Yii... 
		spl_autoload_register(array('YiiBase','autoload'));
	}

	/**
	 * Performs the AJAX validation.
	 * @param Store $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='store-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
