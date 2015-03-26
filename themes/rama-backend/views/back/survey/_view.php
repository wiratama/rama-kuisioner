<?php
/* @var $this SurveyController */
/* @var $data Survey */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_survey')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_survey), array('view', 'id'=>$data->id_survey)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('store_number')); ?>:</b>
	<?php echo CHtml::encode($data->store_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer')); ?>:</b>
	<?php echo CHtml::encode($data->id_customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_question')); ?>:</b>
	<?php echo CHtml::encode($data->id_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_answer')); ?>:</b>
	<?php echo CHtml::encode($data->id_answer); ?>
	<br />


</div>