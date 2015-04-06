<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('store/create');?>">
			<div class="dashboard-div-wrapper bk-clr-one">
				<i class="fa fa-plus dashboard-div-icon"></i>
				<h5>Create </h5>
			</div>
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('store/update', array('id'=>$model->store_number));?>">
			<div class="dashboard-div-wrapper bk-clr-two">
				<i class="fa fa-edit dashboard-div-icon"></i>
				<h5>Edit </h5>
			</div>
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('store/admin');?>">
			<div class="dashboard-div-wrapper bk-clr-three">
				<i class="fa fa-cogs dashboard-div-icon"></i>
				<h5>Manage </h5>
			</div>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h4 class="page-head-line">View Store #<?php echo $model->store_number; ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php 
		// $this->widget('zii.widgets.CDetailView', array(
		$this->widget('bootstrap.widgets.BsDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'store_number',
				'address',
				array(
		        	'label'=>'Score',
		        	'value'=>$skor,
		        ),
			),
		)); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<h4 class="page-head-line">Customer Comment</h4>
	<?php 
		$this->widget('bootstrap.widgets.BsGridView', array(
			'id'=>'store-grid',
			'dataProvider'=>$model->comment($model->store_number),
			// 'filter'=>$model,
			'type' => BsHtml::GRID_TYPE_STRIPED,
			'template' => '{items}{pager}',
			'pager'=>array(
				'htmlOptions' => array(
		            'class' => 'pagination',
		            'id' => '',
		        ),
		        'header'=>'',
			),
			'columns'=>array(
				'comment',			
				'member.name',			
			),
		)); ?>
	</div>
</div>