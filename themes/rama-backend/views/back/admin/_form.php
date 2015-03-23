<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'email'); ?>

	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'password'); ?>

	<?php echo $form->labelEx($model,'repeat_password'); ?>
	<?php echo $form->passwordField($model,'repeat_password',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'repeat_password'); ?>

	<?php echo $form->labelEx($model,'firstname'); ?>
	<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'firstname'); ?>

	<?php echo $form->labelEx($model,'lastname'); ?>
	<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'lastname'); ?>

	<?php echo $form->labelEx($model,'level'); ?>
	<?php echo $form->textField($model,'level',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'level'); ?>
	<hr>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info')); ?>

<?php $this->endWidget(); ?>