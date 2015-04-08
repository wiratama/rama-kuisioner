<?php
/* @var $this QuestionDescriptionController */
/* @var $data QuestionDescription */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_question_description')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_question_description), array('view', 'id'=>$data->id_question_description)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_question')); ?>:</b>
	<?php echo CHtml::encode($data->id_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_language')); ?>:</b>
	<?php echo CHtml::encode($data->id_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />


</div>