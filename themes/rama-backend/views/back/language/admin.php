<?php
/* @var $this LanguageController */
/* @var $model Language */

$this->breadcrumbs=array(
	'Languages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Language', 'url'=>array('index')),
	array('label'=>'Create Language', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#language-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-6">
		<a href="<?php echo Yii::app()->createUrl('language/create');?>">
			<div class="dashboard-div-wrapper bk-clr-one">
				<i class="fa fa-plus dashboard-div-icon"></i>
				<h5>Create </h5>
			</div>
		</a>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Manage Languages</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
		<?php 
		// $this->widget('zii.widgets.grid.CGridView', array(
		$this->widget('bootstrap.widgets.BsGridView', array(
			'id'=>'language-grid',
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
				'id_language',
				'name',
				'code',
				array(
					'name'=>'image',
		          	'type' => 'raw',
		          	'value' => 'CHtml::image(Yii::app()->baseUrl . "/images/language/" . $data->image,"image", array("width"=>"30"))',
		       	),
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
