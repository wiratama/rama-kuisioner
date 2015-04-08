<?php
/* @var $this AnswerDescriptionController */
/* @var $model AnswerDescription */

$this->breadcrumbs=array(
	'Answer Descriptions'=>array('index'),
	$model->id_answer_description=>array('view','id'=>$model->id_answer_description),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnswerDescription', 'url'=>array('index')),
	array('label'=>'Create AnswerDescription', 'url'=>array('create')),
	array('label'=>'View AnswerDescription', 'url'=>array('view', 'id'=>$model->id_answer_description)),
	array('label'=>'Manage AnswerDescription', 'url'=>array('admin')),
);
?>

<h1>Update AnswerDescription <?php echo $model->id_answer_description; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>