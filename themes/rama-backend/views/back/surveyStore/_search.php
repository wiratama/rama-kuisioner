<?php
/* @var $this SurveyStoreController */
/* @var $model SurveyStore */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_survey_store'); ?>
		<?php echo $form->textField($model,'id_survey_store'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'store_number'); ?>
		<?php echo $form->textField($model,'store_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_survey'); ?>
		<?php echo $form->textField($model,'date_survey'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'struk_number'); ?>
		<?php echo $form->textField($model,'struk_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->