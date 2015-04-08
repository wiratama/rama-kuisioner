<?php
/* @var $this QuestionDescriptionController */
/* @var $model QuestionDescription */

$this->breadcrumbs=array(
	'Question Descriptions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionDescription', 'url'=>array('index')),
	array('label'=>'Manage QuestionDescription', 'url'=>array('admin')),
);
?>

<h1>Create QuestionDescription</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>