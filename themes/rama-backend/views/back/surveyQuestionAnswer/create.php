<?php
/* @var $this SurveyQuestionAnswerController */
/* @var $model SurveyQuestionAnswer */

$this->breadcrumbs=array(
	'Survey Question Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveyQuestionAnswer', 'url'=>array('index')),
	array('label'=>'Manage SurveyQuestionAnswer', 'url'=>array('admin')),
);
?>

<h1>Create SurveyQuestionAnswer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>