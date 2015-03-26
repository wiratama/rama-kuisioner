<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	'Surveys'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Survey', 'url'=>array('index')),
	array('label'=>'Create Survey', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#survey-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Manage Surveys</h4>
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
			'id'=>'survey-grid',
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
				'id_survey',
				'store_number',
				'id_customer',
				'id_question',
				'id_answer',
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