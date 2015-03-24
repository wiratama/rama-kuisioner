<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('question/create');?>">
			<div class="dashboard-div-wrapper bk-clr-one">
				<i class="fa fa-plus dashboard-div-icon"></i>
				<h5>Create </h5>
			</div>
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('question/update', array('id'=>$model->id_question));?>">
			<div class="dashboard-div-wrapper bk-clr-two">
				<i class="fa fa-edit dashboard-div-icon"></i>
				<h5>Edit </h5>
			</div>
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('question/admin');?>">
			<div class="dashboard-div-wrapper bk-clr-three">
				<i class="fa fa-cogs dashboard-div-icon"></i>
				<h5>Manage </h5>
			</div>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h4 class="page-head-line">View Question #<?php echo $model->id_question; ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td><b><?php echo $model->getAttributeLabel('question'); ?></b></td>
						<td colspan="2"><?php echo $model->question; ?></td>
					</tr>
					<tr>
						<td><b><?php echo $model->getAttributeLabel('type'); ?></b></td>
						<td colspan="2"><?php echo $model->type; ?></td>
					</tr>
					<tr>
						<td><b><?php echo Answer::model()->getAttributeLabel('answer'); ?></b></td>
						<td><b><?php echo Answer::model()->getAttributeLabel('skor'); ?></b></td>
						<td><b><?php echo Answer::model()->getAttributeLabel('reasonable'); ?></b></td>
					</tr>
					<?php foreach($model2 as $key=>$answer) { ?>
					<tr>
						<td><?php echo $answer->answer; ?></td>
						<td><?php echo $answer->skor; ?></td>
						<td><?php if ($answer->reasonable==1) {echo "Yes";} else {echo "No";} ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>