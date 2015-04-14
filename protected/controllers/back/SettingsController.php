<?php
class SettingsController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + delete',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','update'),
                'expression'=>'!Yii::app()->backendUser->isGuest',
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $settings = Yii::app()->settings;
 
        $model = new SettingsForm();
 
        foreach($model->attributes as $category => $values){
            $cat = $model->$category;
            foreach($values as $key=>$val){
                $cat[$key] = $settings->get($category, $key);
            }
            $model->$category = $cat;
        }
        $this->render('index', array('model' => $model));
    }

    public function actionUpdate()
    {
        $settings = Yii::app()->settings;
 
        $model = new SettingsForm();
 
        if (isset($_POST['SettingsForm'])) {
            $model->setAttributes($_POST['SettingsForm']);
            $settings->deleteCache();
            foreach($model->attributes as $category => $values){
                $settings->set($category, $values);
            }
            Yii::app()->backendUser->setFlash('success', 'Site settings were updated.');
            // $this->refresh();
            $this->redirect(array('index'));
        }
        foreach($model->attributes as $category => $values){
            $cat = $model->$category;
            foreach($values as $key=>$val){
                $cat[$key] = $settings->get($category, $key);
            }
            $model->$category = $cat;
        }
        $this->render('update', array('model' => $model));
    }
 
}
?>