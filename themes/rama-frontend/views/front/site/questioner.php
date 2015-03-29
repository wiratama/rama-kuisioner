<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
        <div class="mylang">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img-lang.png">
            English
        </div>
        <div class="quest-holder">
            <form role="form" method="post" action="<?php echo Yii::app()->createAbsoluteUrl('site/questioner'); ?>">
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
                                    <input type="radio" name="questioner[<?php echo $answer->id_answer;?>]['answer']" value="<?php echo $answer->id_answer;?>">
                                    <?php echo $answer->answer;?><br/>
                                    <?php if ($answer->reasonable==1) { ?>
                                    <input type="text" name="questioner[<?php echo $answer->id_answer;?>]['reason']" class="form-control" placeholder="please specify">
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
                                <input type="checkbox" name="questioner['answer'][<?php echo $question->id_question;?>][]" value="<?php echo $answer->id_answer;?>">
                                <?php echo $answer->answer;?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
                <!-- the quest -->        
                
                <!-- complete bar -->
                <div class="row">
                    <div class="col-md-12 completion">
                        40% COMPLETE
                    </div>
                </div>
                <!-- complete bar -->

                <!-- button next -->
                <div class="row">
                    <div class="button-holder-inside">
                        <input class="btn btn-start" type="submit" name="submit" value="Next">
                    </div>
                </div>
                <!-- button next -->                
            </form>
        </div>
    </div>
</div>