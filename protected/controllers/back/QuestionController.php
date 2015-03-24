<?php

class QuestionController extends Controller
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
				'actions'=>array('create','update','index','view','admin','delete','deleteanswer'),
				// 'users'=>array('@'),
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
		$model=$this->loadModel($id);
		$model2=$this->loadAnswer($id);
		$this->render('view',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Question;
		$model2=new Answer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']) and isset($_POST['Answer']))
		{
			$model->attributes=$_POST['Question'];
			$model2->attributes=$_POST['Answer'];
			// if($model->save()){
				// for ($i = 0; $i < $counter; $i++)
			    // {
			    	/*$answer = new Answer;
		        	$answer->answer = $_POST['Answer']['answer'][$i];
		        	$answer->id_question = $model->id_question;
		        	$answer->skor = $_POST['Answer']['skor'][$i];
		        	$answer->reasonable = $_POST['Answer']['reasonable'][$i];
		         	$answer->save();*/
		         	// var_dump($_POST['Answer']['answer'][$i]);
		         	// var_dump($_POST['Answer']['skor'][$i]);
		         	// var_dump($_POST['Answer']['reasonable'][$i]);
		         	// echo "<br/>================================<br/>";
			    // }
			    // $model2->attributes=$_POST['Answer'];
			    // $model2->save();
		        $model2->attributes=$_POST['Answer'];
		        var_dump($model2->attributes);
			    die();
				// $this->redirect(array('view','id'=>$model->id_question));
			// }
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
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
		$model2=$this->loadAnswer($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']) and isset($_POST['Answer']))
		{
			var_dump($_POST['Answer']);
			die();
			$model->attributes=$_POST['Question'];
			$counter = count($_POST['Answer']['answer']);
		    for ($i = 0; $i < $counter; $i++)
		    {
		    	if (isset($_POST['Answer']['id_answer'][$i])) {
			    	$answer = Answer::model()->findByPk($_POST['Answer']['id_answer'][$i]);
		        	$answer->answer = $_POST['Answer']['answer'][$i];
		        	$answer->id_question = $model->id_question;
		        	$answer->skor = $_POST['Answer']['skor'][$i];
		        	$answer->reasonable = $_POST['Answer']['reasonable'][$i+1];
		         	$answer->save();
		        } else {
		        	$answer = new Answer;
		        	$answer->answer = $_POST['Answer']['answer'][$i];
		        	$answer->id_question = $model->id_question;
		        	$answer->skor = $_POST['Answer']['skor'][$i];
		        	$answer->reasonable = $_POST['Answer']['reasonable'][$i];
		         	$answer->save();
		        }
		    }

			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id_question));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
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
		$this->deleteAllAnswer($id);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Question');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Question('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Question the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Question::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadAnswer($id)
	{
		$model=Answer::model()->findAllByAttributes(array('id_question'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function deleteAllAnswer($id)
	{
		$model=Answer::model()->deleteAllByAttributes(array('id_question'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionDeleteanswer()
	{
		$id_answer=(int)$_POST['id_answer'];
		$model=Answer::model()->findByPk($id_answer);
		if($model->delete()) {
			$delete['response']='0000';
		} else {
			$delete['response']='0011';
		}
		header('Content-type: application/json');
		echo CJSON::encode($delete);
		Yii::app()->end();
	}

	/**
	 * Performs the AJAX validation.
	 * @param Question $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
