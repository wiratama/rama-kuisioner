<?php
/* @var $this StoreController */
/* @var $model Store */

$this->breadcrumbs=array(
	'Stores'=>array('index'),
	$model->store_number=>array('view','id'=>$model->store_number),
	'Update',
);

$this->menu=array(
	array('label'=>'List Store', 'url'=>array('index')),
	array('label'=>'Create Store', 'url'=>array('create')),
	array('label'=>'View Store', 'url'=>array('view', 'id'=>$model->store_number)),
	array('label'=>'Manage Store', 'url'=>array('admin')),
);
?>

<h1>Update Store <?php echo $model->store_number; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>