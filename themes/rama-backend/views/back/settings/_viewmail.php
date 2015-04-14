<?php foreach ($values as $key => $val): ?>
    <div class="control-group">
        <?php echo CHtml::label($model->getAttributesLabels($key), $key); ?>
        <?php 
            echo CHtml::textField('', $val, array('class'=>'form-control','disabled'=>'disabled')); 
        ?>
    </div>
<?php endforeach; ?>