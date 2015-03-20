<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="row">
		<div class="col-md-4">
			<?php echo $form->errorSummary($model); ?>

			<?php echo $form->labelEx($model,'question'); ?>
			<?php echo $form->textArea($model,'question',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'question'); ?>

			<?php echo $form->labelEx($model,'type'); ?>
			<?php //echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->dropDownList($model, 'type', array('radio' => 'Radio button', 'checkbox' => 'Checkbox', 'radio-input'=>'Radio button and input text'), array('prompt'=>'Select one','class'=>'form-control', 'id'=>'question-type')); ?>
			<?php echo $form->error($model,'type'); ?>
		</div>
		<div class="col-md-8 multi-field-wrapper">
			<div class="multi-field-content">
			<?php if ($model2->answer == null) { ?>
				<div class="form-inline multi-field">
					<div class="form-group">
						<?php echo $form->labelEx($model2,'answer'); ?>
						<?php echo $form->textField($model2,'answer[]',array('class'=>'form-control')); ?>
						<?php echo $form->error($model2,'answer[]'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model2,'skor'); ?>
						<?php echo $form->textField($model2,'skor[]',array('class'=>'form-control')); ?>
						<?php echo $form->error($model2,'skor[]'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model2,'reasonable'); ?>
						<?php echo $form->checkBox($model2,'reasonable'); ?>
						<?php echo $form->error($model2,'reasonable[]'); ?>
					</div>
					<button type="button" class="btn btn-sm btn-danger remove-field">delete</button>
				</div>
			<?php } else { ?>
				<?php for($i = 0; $i < sizeof($model->answer); ++$i) { ?>
				<div class="form-inline multi-field">
					<div class="form-group">
						<?php echo $form->labelEx($model2,'answer'); ?>
						<?php echo $form->textField($model2,'answer['.$i.']',array('class'=>'form-control')); ?>
						<?php echo $form->error($model2,'answer['.$i.']'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model2,'skor'); ?>
						<?php echo $form->textField($model2,'skor['.$i.']',array('class'=>'form-control')); ?>
						<?php echo $form->error($model2,'skor['.$i.']'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model2,'reasonable'); ?>
						<?php echo $form->checkBox($model2,'reasonable['.$i.']'); ?>
						<?php echo $form->error($model2,'reasonable['.$i.']'); ?>
					</div>
					<button type="button" class="btn btn-sm btn-danger remove-field">delete</button>
				</div>
				<?php } ?>
				<div class="form-inline multi-field">
					<div class="form-group">
						<?php echo $form->labelEx($model2,'answer'); ?>
						<?php echo $form->textField($model2,'answer[]',array('class'=>'form-control')); ?>
						<?php echo $form->error($model2,'answer[]'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model2,'skor'); ?>
						<?php echo $form->textField($model2,'skor[]',array('class'=>'form-control')); ?>
						<?php echo $form->error($model2,'skor[]'); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model2,'reasonable'); ?>
						<?php echo $form->checkBox($model2,'reasonable[]'); ?>
						<?php echo $form->error($model2,'reasonable[]'); ?>
					</div>
					<button type="button" class="btn btn-sm btn-danger remove-field">delete</button>
				</div>
			<?php } ?>
			</div>
			<hr>
			<button type="button" class="btn btn-sm btn-info add-field">Add more answer</button>
		</div>
	</div>
	<hr>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info')); ?>

<?php $this->endWidget(); ?>
<script type="text/javascript">
$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-field-content', this);
    
    $(".add-field", $(this)).click(function(e) {
    	$('.multi-field:first-child').clone(true).appendTo($('.multi-field-content')).focus();
    });
    
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});
</script>