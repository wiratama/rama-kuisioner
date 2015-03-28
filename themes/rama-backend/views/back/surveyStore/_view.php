<?php
/* @var $this SurveyStoreController */
/* @var $data SurveyStore */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_survey_store')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_survey_store), array('view', 'id'=>$data->id_survey_store)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('store_number')); ?>:</b>
	<?php echo CHtml::encode($data->store_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_survey')); ?>:</b>
	<?php echo CHtml::encode($data->date_survey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('struk_number')); ?>:</b>
	<?php echo CHtml::encode($data->struk_number); ?>
	<br />


</div>