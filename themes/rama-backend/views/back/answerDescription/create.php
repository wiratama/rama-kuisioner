<?php
/* @var $this AnswerDescriptionController */
/* @var $model AnswerDescription */

$this->breadcrumbs=array(
	'Answer Descriptions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnswerDescription', 'url'=>array('index')),
	array('label'=>'Manage AnswerDescription', 'url'=>array('admin')),
);
?>

<h1>Create AnswerDescription</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>