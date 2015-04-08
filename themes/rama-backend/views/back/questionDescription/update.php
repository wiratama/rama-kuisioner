<?php
/* @var $this QuestionDescriptionController */
/* @var $model QuestionDescription */

$this->breadcrumbs=array(
	'Question Descriptions'=>array('index'),
	$model->id_question_description=>array('view','id'=>$model->id_question_description),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestionDescription', 'url'=>array('index')),
	array('label'=>'Create QuestionDescription', 'url'=>array('create')),
	array('label'=>'View QuestionDescription', 'url'=>array('view', 'id'=>$model->id_question_description)),
	array('label'=>'Manage QuestionDescription', 'url'=>array('admin')),
);
?>

<h1>Update QuestionDescription <?php echo $model->id_question_description; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>