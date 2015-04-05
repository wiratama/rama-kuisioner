<?php
/* @var $this SurveyQuestionAnswerController */
/* @var $model SurveyQuestionAnswer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_survey'); ?>
		<?php echo $form->textField($model,'id_survey'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_survey_store'); ?>
		<?php echo $form->textField($model,'id_survey_store'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_customer'); ?>
		<?php echo $form->textField($model,'id_customer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_question'); ?>
		<?php echo $form->textField($model,'id_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_answer'); ?>
		<?php echo $form->textArea($model,'id_answer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason'); ?>
		<?php echo $form->textArea($model,'reason',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->