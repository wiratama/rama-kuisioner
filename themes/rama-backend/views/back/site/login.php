<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Login</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

			<p class="note">Fields with <span class="required">*</span> are required.</p>

			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'username'); ?>

			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'password'); ?>

			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
			<hr/>
			<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-info')); ?>


		<?php $this->endWidget(); ?>
    </div>
</div>
