<?php
/* @var $this SurveyQuestionAnswerController */
/* @var $model SurveyQuestionAnswer */

$this->breadcrumbs=array(
	'Survey Question Answers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SurveyQuestionAnswer', 'url'=>array('index')),
	array('label'=>'Create SurveyQuestionAnswer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#survey-question-answer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Survey Question Answers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'survey-question-answer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_survey',
		'id_survey_store',
		'id_customer',
		'id_question',
		'id_answer',
		'reason',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
