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
            <h2><?php echo Yii::t('Codevaliasi','heading_title');?></h2>
            <?php echo Yii::t('Codevaliasi','welcome_text');?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="box-info"> <?php echo Yii::t('Codevaliasi','label_code');?> : <?php echo $codevalidasi; ?>
            </div>
        </div>
    </div>
    <!-- complete bar -->
        <div class="row">
        <div class="col-md-12 completion">
            100% COMPLETE
        </div>
        </div>
    </div>
    </div>
</div>