<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('customer/create');?>">
			<div class="dashboard-div-wrapper bk-clr-one">
				<i class="fa fa-plus dashboard-div-icon"></i>
				<h5>Create </h5>
			</div>
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('customer/update', array('id'=>$model->id_customer));?>">
			<div class="dashboard-div-wrapper bk-clr-two">
				<i class="fa fa-edit dashboard-div-icon"></i>
				<h5>Edit </h5>
			</div>
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('customer/admin');?>">
			<div class="dashboard-div-wrapper bk-clr-three">
				<i class="fa fa-cogs dashboard-div-icon"></i>
				<h5>Manage </h5>
			</div>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h4 class="page-head-line">View Customer #<?php echo $model->id_customer; ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
		<?php 
		// $this->widget('zii.widgets.CDetailView', array(
		$this->widget('bootstrap.widgets.BsDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				// 'id_customer',
				'name',
				'address',
				'contact',
				'nationality',
				'email',
				'validation_number',
			),
		)); 
		// var_dump($sqa);
		?>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
		<table class="table table-striped table-condensed">
			<tbody>
				<tr>
					<th><label class='lang-label'>Store Number</label></th>
					<td colspan="4"><?php echo $sqa['store_number']; ?></td>
				</tr>
				<tr>
					<th><label class='lang-label'>Comment</label></th>
					<td colspan="4"><?php echo $sqa['comment']; ?></td>
				</tr>
				<?php
				$id_ques=0;
				echo "<tr>";
					echo "<td><label class='lang-label'>Question</label></td>";
					echo "<td><label class='lang-label'>Answer</label></td>";
				echo "</tr>";
				foreach($sqa['survey'] as $sdkey=>$surveydata) {
					echo "<tr>";
					foreach($surveydata as $skey=>$survey) {
						if($survey['id_language_question']==1) {
							if($id_ques!=$survey['id_question']) {
								echo "<td><label>".$survey['question']."</label></td>";
								if (isset($survey['reason'])){
									echo "<td><label class='label-answer'> - ".$survey['answer'].", ".$survey['reason']."</label></td>";
								} else {
									echo "<td><label class='label-answer'> - ".$survey['answer']."</label></td>";
								}
							} else {
								echo "<td></td>";
								if (isset($survey['reason'])){
									echo "<td><label class='label-answer'> - ".$survey['answer'].", ".$survey['reason']."</label></td>";
								} else {
									echo "<td><label class='label-answer'> - ".$survey['answer']."</label></td>";
								}
							}
						}
						$id_ques=$survey['id_question'];
					}
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</div>