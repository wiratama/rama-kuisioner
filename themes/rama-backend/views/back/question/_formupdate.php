<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php if (Yii::app()->user->hasFlash('question-form')) {
	echo BsHtml::alert(
		BsHtml::ALERT_COLOR_SUCCESS, 
		BsHtml::bold('Oops ! ') . Yii::app()->user->getFlash('question-form')
	);
}
?>
	<div class="row">		
		<div class="col-md-4">
			<?php echo $form->errorSummary($model); ?>
			
			<?php foreach ($model['question_desc'] as $key => $questionitem) { ?>
				<label class="lang-label"><?php echo $questionitem['language']['name']; ?></label>
				<br/>
				<?php echo $form->labelEx($questionitem,'question'); ?>
				<?php echo $form->hiddenField($questionitem,'['.$questionitem['id_language'].']id_question_description',array('class'=>'form-control','value'=>$questionitem->id_question_description)); ?>
				<?php echo $form->textArea($questionitem,'['.$questionitem['id_language'].']question',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($questionitem,'question'); ?>
			<?php } ?>

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
				<?php 
				if(isset($model2)) {
					foreach($model2 as $key=>$answer) { 
				?>
				<div class="form-inline multi-field">
					<div class="col-md-11">
						<div class="row">
							<div class="col-md-5">
								<div class="row">
									<?php foreach ($answer['answer_desc'] as $keydsc=>$ansdesc) { ?>
									<div class="form-inline">
										<label class="lang-label"><?php echo $ansdesc['language']['name']; ?></label>
										<br>
										<div class="form-group">	
											<?php echo CHtml::label($answer->getAttributeLabel('answer'),''); ?>
											<?php echo CHtml::hiddenField('Answer[id_answer_description][]',$ansdesc->id_answer_description,array('class'=>'form-control')); ?>
											<?php echo CHtml::textField('Answer[answer]['.$ansdesc->id_answer_description.']',$ansdesc->answer,array('class'=>'form-control')); ?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-7">
								<div class="row">
									<div class="form-inline">
										<div class="form-group">
											<?php echo CHtml::label($answer->getAttributeLabel('skor'),''); ?>
											<?php echo CHtml::hiddenField('Answer[counter][]',$answer->counter,array('class'=>'form-control')); ?>
											<?php echo CHtml::hiddenField('Answer[id_answer][]',$answer->id_answer,array('class'=>'form-control')); ?>
											<?php echo CHtml::textField('Answer[skor][]',$answer->skor,array('class'=>'form-control')); ?>
										</div>
										<div class="form-group">
											<a href="#" data-toggle="modal" data-target="#reasonable"><?php echo CHtml::label($answer->getAttributeLabel('reasonable'),''); ?></a>
											<?php //echo CHtml::checkBox('Answer[reasonable][]',$answer->reasonable,array('uncheckValue'=>0)); ?>
											<?php echo CHtml::dropDownList('Answer[reasonable][]', $answer->reasonable, array('0' => 'No', '1' => 'Yes'), array('class'=>'form-control reason')); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1">
						<div class="row">
							<button type="button" class="btn btn-sm btn-danger remove-field" data-answerid="<?php echo $answer->id_answer; ?>">delete</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<hr>
						</div>
					</div>
				</div>
				<?php 
					}
				} else {
				?>
				<div class="form-inline multi-field">
					<div class="col-md-11">
						<div class="row">
							<div class="col-md-5">
								<div class="row">
									<?php foreach ($language as $keylang=>$lang) { ?>
									<div class="form-inline">
										<label class="lang-label"><?php echo $lang->name; ?></label>
										<br>
										<div class="form-group">	
											<?php echo CHtml::label(Answer::model()->getAttributeLabel('answer'),''); ?>
											<?php echo CHtml::hiddenField('Answer[counter][]','',array('class'=>'form-control')); ?>
											<?php echo CHtml::textField('Answer[answer]['.$lang->id_language.'][]','',array('class'=>'form-control')); ?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-7">
								<div class="row">
									<div class="form-inline">
										<div class="form-group">
											<?php echo CHtml::label(Answer::model()->getAttributeLabel('skor'),''); ?>
											<?php echo CHtml::textField('Answer[skor][]','',array('class'=>'form-control')); ?>
										</div>
										<div class="form-group">
											<a href="#" data-toggle="modal" data-target="#reasonable"><?php echo CHtml::label(Answer::model()->getAttributeLabel('reasonable'),''); ?></a>
											<?php //echo CHtml::checkBox('Answer[reasonable][]',$answer->reasonable,array('uncheckValue'=>0)); ?>
											<?php echo CHtml::dropDownList('Answer[reasonable][]',$model2, array('0' => 'No', '1' => 'Yes'), array('class'=>'form-control reason')); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1">
						<div class="row">
							<button type="button" class="btn btn-sm btn-danger remove-field" >delete</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<hr>
						</div>
					</div>
				</div>
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
    $.each($('select.reason option:selected'), function(index, value) { 
	    // console.log($('select.reason option:selected').text());
	    console.log($(value).text());
	});
});

$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-field-content', this);
    
    $(".add-field", $(this)).click(function(e) {
    	// $('.multi-field:first-child').clone(true).appendTo($('.multi-field-content')).find('input:text,input:hidden').val('').focus();
    	$('.multi-field:first-child').clone(true).appendTo($('.multi-field-content')).find('input:text,input:hidden').val('').focus();
    });
    
    $('.multi-field .remove-field', $wrapper).click(function() {
    	if ($('.multi-field', $wrapper).length > 1) {
    		var $del=$(this).parent().parent().parent('.multi-field');
    	}
    	// console.log($(this).attr("data-answerid"));
    	if($(this).attr("data-answerid")!=undefined) {
	    	if (confirm("Are you sure you want to delete this item?")) {
	        	$.ajax({
					url: "<?php echo Yii::app()->createAbsoluteUrl('question/deleteanswer');?>",
					type: 'post',
					data: 'id_answer=' + $(this).attr("data-answerid"),
					dataType: 'json',
					success: function(json) {
						if (json['response']=='0000') {
							$($del).remove();
						} else if (json['response']=='0011') {
							alert('delete error !');
						}
					}
				});
			}
		} else {
			$($del).remove();
		}
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