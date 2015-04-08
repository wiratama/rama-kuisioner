<?php
/* @var $this AnswerDescriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answer Descriptions',
);

$this->menu=array(
	array('label'=>'Create AnswerDescription', 'url'=>array('create')),
	array('label'=>'Manage AnswerDescription', 'url'=>array('admin')),
);
?>

<h1>Answer Descriptions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
