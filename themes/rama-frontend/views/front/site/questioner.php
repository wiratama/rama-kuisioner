<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
        <div class="mylang">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img-lang.png">
            English
        </div>
        <div class="quest-holder">
            <?php if (isset($_GET['page'])) { ?>
            <form role="form" method="post" action="<?php echo Yii::app()->createAbsoluteUrl('site/questioner',array('page'=>$_GET['page'])); ?>">
            <?php } else { ?>
            <form role="form" method="post" action="<?php echo Yii::app()->createAbsoluteUrl('site/questioner'); ?>">
            <?php } ?>
                <!-- the quest -->
                <?php
                foreach ($model as $questionkey => $question) {
                    if ($question->type=='radio') {
                        if ($questionkey%2==0) {
                            echo '<div class="row quest-bgon">';
                        } else {
                            echo '<div class="row quest-bgoff">';
                        }
                ?>
                        <div class="col-md-12">
                        <p><?php echo $question->question; ?></p>
                            <?php foreach ($question->answer as $answerkey => $answer) { ?>
                            <div class="radio">
                                <label>
                                    <input class="answer" type="radio" name="questioner[<?php echo $question->id_question;?>][answer]" value="<?php echo $answer->id_answer;?>" required="required">
                                    <?php echo $answer->answer;?><br/>
                                    <?php if ($answer->reasonable==1) { ?>
                                    <input type="text" name="questioner[<?php echo $question->id_question;?>][reason][<?php echo $answer->id_answer;?>]" class="form-control reason" placeholder="please specify" >
                                    <?php } ?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php                   
                    } else if ($question->type=='checkbox') {
                    if ($questionkey%2==0) {
                        echo '<div class="col-md-12 bg-on">';
                    } else {
                        echo '<div class="col-md-12 bg-off">';
                    }
                ?>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-7 desc-chose"><?php echo $question->question; ?></div>
                            <?php foreach ($question->answer as $answerkey => $answer) { ?>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="checkbox" class="<?php echo 'checkbox-question-'.$question->id_question;?>" name="questioner[<?php echo $question->id_question;?>][answer][]" value="<?php echo $answer->id_answer;?>" required="required">
                                <?php echo $answer->answer;?>
                            </div>                            
                            <?php } ?>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
                <?php if ($comment==true) { ?>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="rowset">
                    <div class="col-md-12">COMMENT
                        <textarea class="form-control" rows="8" name="questioner[comment]"></textarea>
                    </div>
                </div>
                <?php } ?>
                <!-- the quest -->        
                
                <!-- complete bar -->
                <div class="row">
                    <div class="col-md-12 completion">
                        <?php echo $progress;?>% COMPLETE
                    </div>
                </div>
                <!-- complete bar -->

                <!-- button next -->
                <div class="row">
                    <div class="button-holder-inside">
                        <input class="btn btn-start submit-form" type="submit" name="submit" value="Next">
                    </div>
                </div>
                <!-- button next -->                
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    $("input:radio[class=answer]").click(function() {
        // console.log($(this).next().next());
        $("input.reason").removeAttr("required")
        var $nextel=$(this).next().next();
        if($nextel.is('input.reason')) {
            $nextel.attr("required", "required");
        }
    });
});
</script>
<?php
foreach ($model as $questionkey => $question) {
    if ($question->type=='checkbox') {
        $maxkey=count($question->answer)-1; 
        foreach ($question->answer as $answerkey => $answer) { 
            if ($maxkey==$answerkey) {
?>
                <script type="text/javascript">
                var countChecked = function() {
                    var n = $( "input.<?php echo 'checkbox-question-'.$question->id_question;?>:checked" ).length;
                    if (n<1) {
                        $( "input.<?php echo 'checkbox-question-'.$question->id_question;?>" ).attr('required', 'required');
                        // $('input[name=submit]').attr('disabled', 'disabled');
                    } else if (n>=1) {
                        console.log(n);
                        $( "input.<?php echo 'checkbox-question-'.$question->id_question;?>" ).removeAttr('required');
                        // $('input[name=submit]').attr('disabled', false);
                    }
                };
                countChecked(); 
                $( "input[type=checkbox].<?php echo 'checkbox-question-'.$question->id_question;?>" ).on( "click", countChecked );
                </script>
<?php
            }
        }
    }
}
?>