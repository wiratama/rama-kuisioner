<?php
/* @var $this SurveyQuestionAnswerController */
/* @var $model SurveyQuestionAnswer */

$this->breadcrumbs=array(
	'Survey Question Answers'=>array('index'),
	$model->id_survey,
);

$this->menu=array(
	array('label'=>'List SurveyQuestionAnswer', 'url'=>array('index')),
	array('label'=>'Create SurveyQuestionAnswer', 'url'=>array('create')),
	array('label'=>'Update SurveyQuestionAnswer', 'url'=>array('update', 'id'=>$model->id_survey)),
	array('label'=>'Delete SurveyQuestionAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_survey),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveyQuestionAnswer', 'url'=>array('admin')),
);
?>

<h1>View SurveyQuestionAnswer #<?php echo $model->id_survey; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_survey',
		'store_number',
		'id_customer',
		'id_question',
		'id_answer',
		'reason',
	),
)); ?>
