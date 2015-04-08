<?php
/* @var $this AnswerDescriptionController */
/* @var $model AnswerDescription */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_answer_description'); ?>
		<?php echo $form->textField($model,'id_answer_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_language'); ?>
		<?php echo $form->textField($model,'id_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_answer'); ?>
		<?php echo $form->textField($model,'id_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->