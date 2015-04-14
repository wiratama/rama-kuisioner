<?php foreach ($values as $key => $val): ?>
    <div class="control-group">
        <?php echo CHtml::label($model->getAttributesLabels($key), $key); ?>
        <?php 
        echo CHtml::textArea('', $val,
			array(
			 	'rows'=>6,
			 	'cols'=>50,
			 	'class'=>'form-control',
			 	'disabled'=>'disabled'
			)
		); 
       ?>
    </div>
<?php endforeach; ?>