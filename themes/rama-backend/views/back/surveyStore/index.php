<?php
/* @var $this SurveyStoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Survey Stores',
);

$this->menu=array(
	array('label'=>'Create SurveyStore', 'url'=>array('create')),
	array('label'=>'Manage SurveyStore', 'url'=>array('admin')),
);
?>

<h1>Survey Stores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
