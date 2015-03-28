<?php
/* @var $this SurveyQuestionAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Survey Question Answers',
);

$this->menu=array(
	array('label'=>'Create SurveyQuestionAnswer', 'url'=>array('create')),
	array('label'=>'Manage SurveyQuestionAnswer', 'url'=>array('admin')),
);
?>

<h1>Survey Question Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
