<?php
/* @var $this SurveyStoreController */
/* @var $model SurveyStore */

$this->breadcrumbs=array(
	'Survey Stores'=>array('index'),
	$model->id_survey_store,
);

$this->menu=array(
	array('label'=>'List SurveyStore', 'url'=>array('index')),
	array('label'=>'Create SurveyStore', 'url'=>array('create')),
	array('label'=>'Update SurveyStore', 'url'=>array('update', 'id'=>$model->id_survey_store)),
	array('label'=>'Delete SurveyStore', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_survey_store),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveyStore', 'url'=>array('admin')),
);
?>

<h1>View SurveyStore #<?php echo $model->id_survey_store; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_survey_store',
		'store_number',
		'date_survey',
		'struk_number',
	),
)); ?>
