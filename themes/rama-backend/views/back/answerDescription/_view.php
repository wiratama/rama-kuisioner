<?php
/* @var $this AnswerDescriptionController */
/* @var $data AnswerDescription */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_answer_description')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_answer_description), array('view', 'id'=>$data->id_answer_description)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_language')); ?>:</b>
	<?php echo CHtml::encode($data->id_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_answer')); ?>:</b>
	<?php echo CHtml::encode($data->id_answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />


</div>