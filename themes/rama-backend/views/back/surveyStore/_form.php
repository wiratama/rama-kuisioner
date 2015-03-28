<?php
/* @var $this SurveyStoreController */
/* @var $model SurveyStore */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-store-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'store_number'); ?>
		<?php echo $form->textField($model,'store_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'store_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_survey'); ?>
		<?php echo $form->textField($model,'date_survey'); ?>
		<?php echo $form->error($model,'date_survey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'struk_number'); ?>
		<?php echo $form->textField($model,'struk_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'struk_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->