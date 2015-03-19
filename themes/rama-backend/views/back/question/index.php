<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
	<a href="">
		<div class="dashboard-div-wrapper bk-clr-one">
			<i class="fa fa-plus dashboard-div-icon"></i>
			<h5>Create </h5>
		</div>
	</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<div class="dashboard-div-wrapper bk-clr-two">
			<i class="fa fa-edit dashboard-div-icon"></i>
			<h5>Edit </h5>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<div class="dashboard-div-wrapper bk-clr-three">
			<i class="fa fa-cogs dashboard-div-icon"></i>
			<h5>Manage </h5>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<div class="dashboard-div-wrapper bk-clr-four">
			<i class="fa fa-remove dashboard-div-icon"></i>
			<h5>Remove </h5>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Questions</h4>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>