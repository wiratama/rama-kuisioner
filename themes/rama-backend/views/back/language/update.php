<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('language/admin');?>">
			<div class="dashboard-div-wrapper bk-clr-three">
				<i class="fa fa-cogs dashboard-div-icon"></i>
				<h5>Manage </h5>
			</div>
		</a>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Update Language <?php echo $model->id_language; ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>