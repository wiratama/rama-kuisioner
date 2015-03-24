<?php
/* @var $this AnswerController */
/* @var $model Answer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'answer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>	

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skor'); ?>
		<?php echo $form->textField($model,'skor'); ?>
		<?php echo $form->error($model,'skor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reasonable'); ?>
		<?php //echo $form->textArea($model,'reasonable',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->checkBox($model,'reasonable',array('value'=>'1', 'uncheckValue'=>'0')); ?>
		<?php echo $form->error($model,'reasonable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->