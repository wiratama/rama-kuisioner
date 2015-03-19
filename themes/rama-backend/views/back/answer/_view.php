<?php
/* @var $this AnswerController */
/* @var $data Answer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_answer')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_answer), array('view', 'id'=>$data->id_answer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_question')); ?>:</b>
	<?php echo CHtml::encode($data->id_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skor')); ?>:</b>
	<?php echo CHtml::encode($data->skor); ?>
	<br />


</div>