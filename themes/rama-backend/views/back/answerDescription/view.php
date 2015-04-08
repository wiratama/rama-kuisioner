<?php
/* @var $this AnswerDescriptionController */
/* @var $model AnswerDescription */

$this->breadcrumbs=array(
	'Answer Descriptions'=>array('index'),
	$model->id_answer_description,
);

$this->menu=array(
	array('label'=>'List AnswerDescription', 'url'=>array('index')),
	array('label'=>'Create AnswerDescription', 'url'=>array('create')),
	array('label'=>'Update AnswerDescription', 'url'=>array('update', 'id'=>$model->id_answer_description)),
	array('label'=>'Delete AnswerDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_answer_description),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnswerDescription', 'url'=>array('admin')),
);
?>

<h1>View AnswerDescription #<?php echo $model->id_answer_description; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_answer_description',
		'id_language',
		'id_answer',
		'answer',
	),
)); ?>
