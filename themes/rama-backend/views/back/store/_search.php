<?php
/* @var $this StoreController */
/* @var $model Store */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->label($model,'store_number'); ?>
	<?php echo $form->textField($model,'store_number',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>

	<?php echo $form->label($model,'address'); ?>
	<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
	<hr>
	<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>

<?php $this->endWidget(); ?>