<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
        <div class="content-holder">
        <!-- language -->
        <div class="mylang">
        <?php foreach ($language as $keylang=>$lang) { ?>
            <img onclick="javascript:setLang(<?php echo $lang->id_language; ?>)" src="<?php echo  Yii::app()->baseUrl; ?>/images/language/<?php echo $lang->image;?>" width="26" class="language"> <?php echo $lang->name; ?>
        <?php } ?>
        </div>
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
        <?php if(Yii::app()->user->hasFlash('frontend-form')):?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::app()->user->getFlash('frontend-form'); ?>
            </div>
        <?php endif; ?>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'name',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control','required'=>'required')); ?>
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
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>300,'class'=>'form-control','required'=>'required')); ?>
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
                        <?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50,'class'=>'form-control','required'=>'required','id'=>'contact')); ?>
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
                        <?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>300,'class'=>'form-control','required'=>'required')); ?>
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
                        <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control','required'=>'required')); ?>
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
<script type="text/javascript">
$(document).ready(function() {
    $("#contact").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>