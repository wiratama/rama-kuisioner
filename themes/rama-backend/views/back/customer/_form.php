<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'name'); ?>

	<?php echo $form->labelEx($model,'address'); ?>
	<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'address'); ?>

	<?php echo $form->labelEx($model,'contact'); ?>
	<?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'contact'); ?>

	<?php echo $form->labelEx($model,'nationality'); ?>
	<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'nationality'); ?>

	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'email'); ?>

	<?php echo $form->labelEx($model,'validation_number'); ?>
	<?php echo $form->textField($model,'validation_number',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
	<?php echo $form->error($model,'validation_number'); ?>
	<hr>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-info')); ?>

<?php $this->endWidget(); ?>