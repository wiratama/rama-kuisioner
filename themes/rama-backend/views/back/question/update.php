<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
		<div class="dashboard-div-wrapper bk-clr-three">
			<i class="fa fa-cogs dashboard-div-icon"></i>
			<h5>Manage </h5>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Update Question <?php echo $model->id_question; ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
		<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>
	</div>
</div>