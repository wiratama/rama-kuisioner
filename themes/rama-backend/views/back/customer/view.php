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
)); ?>
