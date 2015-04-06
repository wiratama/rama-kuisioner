<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>

		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>

		<?php echo $form->label($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>

		<?php echo $form->label($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>

		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>

		<?php echo $form->label($model,'validation_number'); ?>
		<?php echo $form->textField($model,'validation_number',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
		<hr>
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>

<?php $this->endWidget(); ?>