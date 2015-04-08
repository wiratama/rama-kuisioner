<?php
/* @var $this QuestionDescriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Question Descriptions',
);

$this->menu=array(
	array('label'=>'Create QuestionDescription', 'url'=>array('create')),
	array('label'=>'Manage QuestionDescription', 'url'=>array('admin')),
);
?>

<h1>Question Descriptions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
