<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
	<a href="<?php echo Yii::app()->createUrl('customer/create');?>">
		<div class="dashboard-div-wrapper bk-clr-one">
			<i class="fa fa-plus dashboard-div-icon"></i>
			<h5>Create </h5>
		</div>
	</a>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Manage Customers</h4>
    </div>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row">
    <div class="col-md-12">
		<?php 
		// $this->widget('zii.widgets.grid.CGridView', array(
		$this->widget('bootstrap.widgets.BsGridView', array(
			'id'=>'customer-grid',
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
				// 'id_customer',
				'name',
				'address',
				'contact',
				'nationality',
				'email',
				'validation_number',
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