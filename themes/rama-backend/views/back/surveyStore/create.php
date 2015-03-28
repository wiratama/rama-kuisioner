<?php
/* @var $this SurveyStoreController */
/* @var $model SurveyStore */

$this->breadcrumbs=array(
	'Survey Stores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveyStore', 'url'=>array('index')),
	array('label'=>'Manage SurveyStore', 'url'=>array('admin')),
);
?>

<h1>Create SurveyStore</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>