<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
    <div class="content-holder">
    <!-- language -->
    <div class="mylang"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img-lang.png">English</div>
    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <h2>Guest Experience Survey</h2>
            Welcome to Rama Restaurants Bali Guest Experience Survey. Thank you for taking the time to fill out our questioner. This will help us to ensure better service for the future. 
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img-front.jpg" class="img-responsive img-holder">
        </div>
    </div>
    <!-- form -->
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'survey-store-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'class'=>'format-style',
        )
    )); ?>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <?php echo $form->labelEx($model,'store_number',array('class'=>'standart-label')); ?>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <?php //echo $form->textField($model,'store_number',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                    <?php echo $form->dropDownList($model,'store_number',CHtml::listData(Store::model()->findAll(), 'store_number', 'store_number'),array('empty'=>'Please Choose One','id'=>'category','class'=>'form-control'));?>
                    <?php echo $form->error($model,'store_number'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <?php echo $form->labelEx($model,'date_survey',array('class'=>'standart-label')); ?>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <?php //echo $form->textField($model,'date_survey',array('class'=>'form-control')); ?>
                    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'date_survey',
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => 'yy-mm-dd', // save to db format
                            'altField' => 'date_survey',
                            'altFormat' => 'yy-dd-mm', // show to user format
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control'
                            ),
                        ));  
                    ?>
                    <?php echo $form->error($model,'date_survey'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <?php echo $form->labelEx($model,'struk_number',array('class'=>'standart-label')); ?>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <?php echo $form->textField($model,'struk_number',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'struk_number'); ?>
                </div>
            </div>
        </div>

        <div class="button-holder">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Begin' : 'Save', array('class'=>'btn btn-start')); ?>
        </div>

    <?php $this->endWidget(); ?>
    <!-- form -->
    </div>
    </div>
</div>