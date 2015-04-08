<?php
/* @var $this QuestionDescriptionController */
/* @var $model QuestionDescription */

$this->breadcrumbs=array(
	'Question Descriptions'=>array('index'),
	$model->id_question_description,
);

$this->menu=array(
	array('label'=>'List QuestionDescription', 'url'=>array('index')),
	array('label'=>'Create QuestionDescription', 'url'=>array('create')),
	array('label'=>'Update QuestionDescription', 'url'=>array('update', 'id'=>$model->id_question_description)),
	array('label'=>'Delete QuestionDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_question_description),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionDescription', 'url'=>array('admin')),
);
?>

<h1>View QuestionDescription #<?php echo $model->id_question_description; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_question_description',
		'id_question',
		'id_language',
		'question',
	),
)); ?>
