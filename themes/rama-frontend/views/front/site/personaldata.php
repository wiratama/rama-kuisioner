<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
        <div class="content-holder">
        <!-- language -->
        <div class="mylang"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img-lang.png">English</div>
        <!-- content -->
        <div class="row">
            <div class="col-md-12">
                <h2>Dear Valued Guest,</h2>
                We need your assistant in our effort to extend the finest service at our Restaurant.  We would appreciate it very much if you could take a few minutes to fill the following questionnaires. 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="box-info"> Your comments would be <br> 
                    highly appreciated 
                </div>
            </div>
        </div>
        <!-- form -->
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'customer-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'name',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'address',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'address'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'contact',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'contact'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'nationality',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'nationality'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'email',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="button-holder">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Next' : 'Save', array('class'=>'btn btn-start')); ?>
                </div>
            </div>

        <?php $this->endWidget(); ?>
        <!-- form -->
        </div>
    </div>
</div>