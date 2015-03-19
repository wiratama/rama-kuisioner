<?php
/* @var $this AnswerController */
/* @var $model Answer */

$this->breadcrumbs=array(
	'Answers'=>array('index'),
	$model->id_answer=>array('view','id'=>$model->id_answer),
	'Update',
);

$this->menu=array(
	array('label'=>'List Answer', 'url'=>array('index')),
	array('label'=>'Create Answer', 'url'=>array('create')),
	array('label'=>'View Answer', 'url'=>array('view', 'id'=>$model->id_answer)),
	array('label'=>'Manage Answer', 'url'=>array('admin')),
);
?>

<h1>Update Answer <?php echo $model->id_answer; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>