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
				'actions'=>array('create','update','index','view','admin','delete'),
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

		$comment=Comment::model()->with('member')->findAllByAttributes(array('store_number'=>$model->store_number));
		/*$page = (isset($_GET['page']) ? $_GET['page'] : 1);

        $query = Yii::app()->db->createCommand() //this query contains all the data
        ->select(array('*'))
        ->from(array('comment t1', 'customer t2'))
        ->where("t1.store_number = '".$model->store_number."' AND t2.id_customer = t1.id_customer")
        ->limit(1, $page-1)
        ->queryAll();
        
        $item_count = Yii::app()->db->createCommand()
        ->select('count(*) as count')
        ->from(array('comment t1', 'customer t2')) 
        ->where("t1.store_number = '".$model->store_number."' AND t2.id_customer = t1.id_customer")
        ->queryAll();

		// the pagination itself
        $pages = new CPagination($item_count);
        $pages->setPageSize(1);*/

		$this->render('view',array(
			'model'=>$model,
			'skor'=>$skor,
			/*'query'=>$query,
            'item_count'=>$item_count,
            'page_size'=>1,
            'pages'=>$pages,*/
            'comment'=>$comment,
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
