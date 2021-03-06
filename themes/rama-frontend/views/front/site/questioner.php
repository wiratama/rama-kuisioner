<div class="row">
	<div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
		<div class="mylang">
			<ul class="lang">
				<?php foreach ($language as $keylang=>$lang) { ?>
				<li class="language">
					<a href="javascript:void(0)" onclick="setLang(<?php echo $lang->id_language; ?>);">
						<img src="<?php echo  Yii::app()->baseUrl; ?>/images/language/<?php echo $lang->image;?>" width="26">
						<?php echo $lang->name; ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div class="quest-holder">
			<?php if (isset($_GET['page'])) { ?>
			<form role="form" method="post" action="<?php echo Yii::app()->createAbsoluteUrl('site/questioner',array('page'=>$_GET['page'])); ?>">
			<?php } else { ?>
			<form role="form" method="post" action="<?php echo Yii::app()->createAbsoluteUrl('site/questioner'); ?>">
			<?php } ?>
				<!-- the quest -->
				<?php
				foreach ($model as $questionkey=>$question) {
					foreach($question['question_desc'] as $qdesc) {
						if ($question['type']=='radio') {
							if ($questionkey%2==0) {
								echo '<div class="row quest-bgon">';
							} else {
								echo '<div class="row quest-bgoff">';
							}
				?>
								<div class="col-md-12">
									<p><?php echo $qdesc['question']; ?></p>
									<?php 
									$maxkey=count($question['answer'])-1;
									foreach ($question['answer'] as $answerkey => $qas) {
										foreach($qas['answer_desc'] as $ans) {
									?>
									<div class="radio">
										<label>
											<input class="answer" type="radio" name="questioner[<?php echo $question['id_question'];?>][answer]" value="<?php echo $qas['id_answer'];?>" required="required">
											<?php echo $ans['answer'];?>                                    
											<?php
												if ($maxkey==$answerkey) {
											?>
												<input type="hidden" name="questioner[<?php echo $question['id_question'];?>][jenis_input]" value="<?php echo $question['type']; ?>" >
											<?php
												}
											?>
										</label>
										<?php if ($qas['reasonable']==1) { ?>
											<br/>
											<input type="text" name="questioner[<?php echo $question['id_question'];?>][reason][<?php echo $qas['id_answer'];?>]" class="form-control reason" placeholder="please specify" >
										<?php } ?>
									</div>
									<?php 
										}
									}
									?>
								</div>
							</div>
				<?php
						} else if ($question['type']=='checkbox') {
							if ($questionkey%2==0) {
								echo '<div class="col-md-12 quest-bgon">';
							} else {
								echo '<div class="col-md-12 quest-bgoff">';
							}
				?>
								<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-7 desc-chose"><?php echo $qdesc['question']; ?></div>
								<?php 
								$maxkey=count($question['answer'])-1;
								foreach ($question['answer'] as $answerkey => $qas) {
									foreach($qas['answer_desc'] as $ans) {
								?>
								<div class="col-xs-12 col-sm-12 col-md-12">                            
									<input type="checkbox" class="<?php echo 'checkbox-question-'.$question['id_question'];?>" name="questioner[<?php echo $question['id_question'];?>][answer][]" value="<?php echo $qas['id_answer'];?>" required="required">
									<?php echo $ans['answer'];?>
									<?php if ($qas['reasonable']==1) { ?>
										<br/>
										<input type="text" name="questioner[<?php echo $question['id_question'];?>][reason][<?php echo $qas['id_answer'];?>]" class="form-control reason" placeholder="please specify" >
									<?php } ?>
								</div>                            
								<?php 
									}
								}
								?>
							</div>
						</div>
				<?php
						}
						// echo $question['type'].'<br>';
						// echo $question['id_question'].'==';
						// echo $qdesc['question'];
						// echo '<br/>';
						// foreach($question['answer'] as $qas) {
							// echo $qas['id_answer'].'==';
							// foreach($qas['answer_desc'] as $ans) {
								// echo $ans['answer'];
								// echo '<br/>';
							// }
						// }
					}
				}
				/*foreach ($model as $questionkey => $question) {
					if ($question->type=='radio') {
						if ($questionkey%2==0) {
							echo '<div class="row quest-bgon">';
						} else {
							echo '<div class="row quest-bgoff">';
						}
				?>
						<div class="col-md-12">
						<p><?php echo $question->question; ?></p>
							<?php 
							$maxkey=count($question->answer)-1;
							foreach ($question->answer as $answerkey => $answer) { 
							?>
							<div class="radio">
								<label>
									<input class="answer" type="radio" name="questioner[<?php echo $question->id_question;?>][answer]" value="<?php echo $answer->id_answer;?>" required="required">
									<?php echo $answer->answer;?>                                    
									<?php
										if ($maxkey==$answerkey) {
									?>
										<input type="hidden" name="questioner[<?php echo $question->id_question;?>][jenis_input]" value="<?php echo $question->type; ?>" >
									<?php
										}
									?>
								</label>
								<?php if ($answer->reasonable==1) { ?>
									<br/>
									<input type="text" name="questioner[<?php echo $question->id_question;?>][reason][<?php echo $answer->id_answer;?>]" class="form-control reason" placeholder="please specify" >
								<?php } ?>
							</div>
							<?php } ?>
						</div>
					</div>
				<?php                   
					} else if ($question->type=='checkbox') {
					if ($questionkey%2==0) {
						echo '<div class="col-md-12 bg-on">';
					} else {
						echo '<div class="col-md-12 bg-off">';
					}
				?>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-7 desc-chose"><?php echo $question->question; ?></div>
							<?php 
							$maxkey=count($question->answer)-1;
							foreach ($question->answer as $answerkey => $answer) { 
							?>
							<div class="col-xs-12 col-sm-12 col-md-12">                            
								<input type="checkbox" class="<?php echo 'checkbox-question-'.$question->id_question;?>" name="questioner[<?php echo $question->id_question;?>][answer][]" value="<?php echo $answer->id_answer;?>" required="required">
								<?php echo $answer->answer;?>
								<?php if ($answer->reasonable==1) { ?>
									<br/>
									<input type="text" name="questioner[<?php echo $question->id_question;?>][reason][<?php echo $answer->id_answer;?>]" class="form-control reason" placeholder="please specify" >
								<?php } ?>
							</div>                            
							<?php } ?>
						</div>
					</div>
				<?php
					}
				}*/
				?>
				<?php if ($comment==true) { ?>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="rowset">
					<div class="col-md-12">COMMENT
						<textarea class="form-control" rows="8" name="comment" required="required"></textarea>
					</div>
				</div>
				<?php } ?>
				<!-- the quest -->        
				
				<!-- complete bar -->
				<div class="row">
					<div class="col-md-12 completion">
						<?php echo $progress;?>% COMPLETE
					</div>
				</div>
				<!-- complete bar -->

				<!-- button next -->
				<div class="row">
					<div class="button-holder-inside">
						<input class="btn btn-start submit-form" type="submit" name="submit" value="Next">
					</div>
				</div>
				<!-- button next -->                
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	$("input:radio[class=answer]").click(function() {
		// console.log($(this).next().next());
		$("input.reason").removeAttr("required")
		var $nextel=$(this).next().next();
		if($nextel.is('input.reason')) {
			$nextel.attr("required", "required");
		}
	});
});
</script>
<?php
foreach ($model as $questionkey => $question) {
	if ($question->type=='checkbox') {
		$maxkey=count($question->answer)-1; 
		foreach ($question->answer as $answerkey => $answer) { 
			if ($maxkey==$answerkey) {
?>
				<script type="text/javascript">
				var countChecked = function() {
					var n = $( "input.<?php echo 'checkbox-question-'.$question->id_question;?>:checked" ).length;
					if (n<1) {
						$( "input.<?php echo 'checkbox-question-'.$question->id_question;?>" ).attr('required', 'required');
						/*if($( "input.<?php echo 'checkbox-question-'.$question->id_question;?>" ).next().next().length==1){
							$( "input.<?php echo 'checkbox-question-'.$question->id_question;?>" ).next().next().attr('required', 'required');
						}*/
						// $('input[name=submit]').attr('disabled', 'disabled');
					} else if (n>=1) {
						// console.log(n);
						$( "input.<?php echo 'checkbox-question-'.$question->id_question;?>" ).removeAttr('required');
						// $('input[name=submit]').attr('disabled', false);
					}
				};
				countChecked(); 
				$( "input[type=checkbox].<?php echo 'checkbox-question-'.$question->id_question;?>" ).on( "click", countChecked );

				var getElement = function() {
					// console.log($( "input:checked" ).next().next());
					if($( "input:checked" ).next().next().length==1){
						$( "input:checked" ).next().next().attr('required', 'required');
					} else if($(this).next().next().length==1 && $(this).is( ":checked" )==false){
						$(this).next().next().removeAttr('required');
					}
				};
				$( "input[type=checkbox]").on("click",getElement);
				</script>
<?php
			}
		}
	}
}
?>