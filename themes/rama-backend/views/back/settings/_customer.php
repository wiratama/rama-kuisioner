<?php foreach ($values as $key => $val): ?>
    <div class="control-group">
        <?php echo CHtml::label($model->getAttributesLabels($key), $key); ?>
        <?php 
        echo CHtml::textArea(
            get_class($model) . '[' . $category . '][' . $key . ']',
            $val,
            array(
                'rows'=>6,
                'cols'=>50,
                'class'=>'form-control',
            )
        ); 
       ?>
        <?php echo CHtml::error($model, $category); ?>
    </div>
<?php endforeach; ?>