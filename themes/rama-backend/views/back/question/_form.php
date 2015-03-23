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
			<?php echo $form->dropDownList($model, 'type', array('radio' => 'Radio button', 'checkbox' => 'Checkbox'), array('prompt'=>'Select one','class'=>'form-control', 'id'=>'question-type', 'onchange'=>'questType(this)',)); ?>
			<?php echo $form->error($model,'type'); ?>			

			<div class="col-md-12" id="info-question">
				<div class="row">
				<hr>
					<div class="panel panel-primary" id="info-checkbox">
		                <div class="panel-heading">
		                    Example
		                </div>
		                <div class="panel-body">
		                	Checkbox type
		                	<hr>
		                	<div class="form-inline">
		                		<div class="form-group">
		                			<label>Food Taste: </label>
		                			<input type="checkbox"> POOR
		                			<input type="checkbox"> AVERANGE
		                			<input type="checkbox"> GOOD
		                			<input type="checkbox"> VERY GOOD
		                			<input type="checkbox"> EXCELENT
		                		</div>
		                	</div>
		                </div>
		            </div>
		            <div class="panel panel-primary" id="info-radio">
		                <div class="panel-heading">
		                    Example
		                </div>
		                <div class="panel-body">
		                	Radio button type
		                	<hr>
		                	<div class="form-inline">
		                		<div class="form-group">
		                			<label>Food Taste: </label>
		                			<input type="radio"> POOR
		                			<input type="radio"> AVERANGE
		                			<input type="radio"> GOOD
		                			<input type="radio"> VERY GOOD
		                			<input type="radio"> EXCELENT
		                		</div>
		                	</div>
		                </div>
		            </div>
				</div>
			</div>

		</div>
		<div class="col-md-8 multi-field-wrapper">
			<div class="multi-field-content">
				<?php if (!isset($model2)) { ?>
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
							<a href="#" data-toggle="modal" data-target="#reasonable"><?php echo $form->labelEx($model2,'reasonable'); ?></a>
							<?php echo $form->checkBox($model2,'reasonable[]',array('value' => 1, 'uncheckValue'=>0)); ?>
							<?php echo $form->error($model2,'reasonable[]'); ?>
						</div>
						<button type="button" class="btn btn-sm btn-danger remove-field">delete</button>
					</div>
				<?php } else { ?>
					<?php 
					for($i = 0; $i < sizeof($model2); ++$i) {
						// var_dump($model2[$i]['answer']);
						// var_dump($model2[$i]['skor']);
						// var_dump($model2[$i]['reasonable']);
					?>
					<div class="form-inline multi-field">
						<div class="form-group">
							<?php echo $form->labelEx($model2,'answer'); ?>
							<?php echo $form->textField($model2[$i]['answer'],'answer[]',array('class'=>'form-control')); ?>
							<?php echo $form->error($model2[$i]['answer'],'answer[]'); ?>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($model2,'skor'); ?>
							<?php echo $form->textField($model2[$i]['skor'],'skor[]',array('class'=>'form-control')); ?>
							<?php echo $form->error($model2[$i]['skor'],'skor[]'); ?>
						</div>
						<div class="form-group">
							<a href="#" data-toggle="modal" data-target="#reasonable"><?php echo $form->labelEx($model2,'reasonable'); ?></a>
							<?php echo $form->checkBox($model2[$i]['reasonable'],'reasonable[]',array('value' => 1, 'uncheckValue'=>0)); ?>
							<?php echo $form->error($model2[$i]['reasonable'],'reasonable[]'); ?>
						</div>
						<button type="button" class="btn btn-sm btn-danger remove-field">delete</button>
					</div>
					<?php } ?>
				<?php } ?>
			</div>			
			<hr>
			<button type="button" class="btn btn-sm btn-info add-field">Add more answer</button>
		</div>
	</div>
	<hr>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info')); ?>

<div class="modal fade" id="reasonable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
    		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        		<h4 class="modal-title" id="myModalLabel"><i class="fa fa-life-ring"></i> Reasonable answer</h4>
    		</div>
	    	<div class="modal-body">
	        	Apabila di centang, maka jawaban dimaksudkan untuk meminta penjelasan tambahan dari customer ketika mengisi survey.<br>
	        	Contoh : 
	        	<p>Answer : Other,  <input class="form-control" type="text" placeholder="your reason for the answer"> </p>
	    	</div>
    	</div>
	</div>
</div>


<?php $this->endWidget(); ?>
<script type="text/javascript">
$( document ).ready(function() {
    $('#info-question').hide();
    $('#info-checkbox').hide();
    $('#info-radio').hide();
});

$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-field-content', this);
    
    $(".add-field", $(this)).click(function(e) {
    	$('.multi-field:first-child').clone(true).appendTo($('.multi-field-content')).find('input:text').val('').focus();
    });
    
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});

function questType (question) {
	$('#info-question').hide();
    $('#info-checkbox').hide();
    $('#info-radio').hide();

	if (question.value=="checkbox") {
		$('#info-question').show();
		$('#info-checkbox').show();
		$('#info-radio').hide();
	} else if (question.value=="radio") {
		$('#info-question').show();
		$('#info-checkbox').hide();
		$('#info-radio').show();
	}
}
</script>