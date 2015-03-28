<?php
/* @var $this SurveyStoreController */
/* @var $model SurveyStore */

$this->breadcrumbs=array(
	'Survey Stores'=>array('index'),
	$model->id_survey_store=>array('view','id'=>$model->id_survey_store),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveyStore', 'url'=>array('index')),
	array('label'=>'Create SurveyStore', 'url'=>array('create')),
	array('label'=>'View SurveyStore', 'url'=>array('view', 'id'=>$model->id_survey_store)),
	array('label'=>'Manage SurveyStore', 'url'=>array('admin')),
);
?>

<h1>Update SurveyStore <?php echo $model->id_survey_store; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>