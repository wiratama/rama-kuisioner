<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#question-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
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
	<?php /*
	<div class="col-md-3 col-sm-3 col-xs-6">
		<div class="dashboard-div-wrapper bk-clr-four">
			<i class="fa fa-remove dashboard-div-icon"></i>
			<h5>Remove </h5>
		</div>
	</div>
	*/ ?>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Manage Questions</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
		<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn btn-success')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->
	</div>
</div>
<div class="row">
    <div class="col-md-12">
		<?php 
		// $this->widget('zii.widgets.grid.CGridView', array(
		$this->widget('bootstrap.widgets.BsGridView', array(
			'id'=>'question-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'type' => BsHtml::GRID_TYPE_STRIPED,
			'pager'=>array(
				'htmlOptions' => array(
		            'class' => 'pagination',
		            'id' => '',
		        ),
		        'header'=>'',
			),
			'columns'=>array(
				// 'id_question',
				'question',
				'type',
				array(
					'header' => 'Actions',
					'class' => 'CButtonColumn',
					'buttons'=>array(
						'update' => array(
							'imageUrl' =>false,
							'label' => '',
							'options' => array( 'title'=>'Edit', 'class' => 'glyphicon glyphicon-pencil'),
						),
						'view' => array(
							'imageUrl' =>false,
							'label' => '',
							'options' => array( 'title'=>'View', 'class' => 'glyphicon glyphicon-eye-open'),                        
						),
						'delete' => array(
							'imageUrl' =>false,
							'label' => '',
							'options' => array( 'title'=>'Delete', 'class' => 'glyphicon glyphicon-remove-circle'),                        
						),
					),
				),
			),
		)); ?>
	</div>
</div>