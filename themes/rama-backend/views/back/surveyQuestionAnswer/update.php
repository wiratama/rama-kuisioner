<?php
/* @var $this SurveyQuestionAnswerController */
/* @var $model SurveyQuestionAnswer */

$this->breadcrumbs=array(
	'Survey Question Answers'=>array('index'),
	$model->id_survey=>array('view','id'=>$model->id_survey),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveyQuestionAnswer', 'url'=>array('index')),
	array('label'=>'Create SurveyQuestionAnswer', 'url'=>array('create')),
	array('label'=>'View SurveyQuestionAnswer', 'url'=>array('view', 'id'=>$model->id_survey)),
	array('label'=>'Manage SurveyQuestionAnswer', 'url'=>array('admin')),
);
?>

<h1>Update SurveyQuestionAnswer <?php echo $model->id_survey; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>