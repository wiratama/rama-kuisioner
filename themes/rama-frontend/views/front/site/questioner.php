<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
        <div class="mylang">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img-lang.png">
            English
        </div>
        <div class="quest-holder">
            <form role="form">
                <!-- the quest -->
                <?php
                foreach ($model as $questionkey => $question) {
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
                                    <input type="radio" name="questioner[<?php echo $question->id_question;?>][]" value="<?php echo $answer->id_answer;?>">
                                    <?php echo $answer->answer;?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php                   
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
                        <a href="4rd-page.php" class="btn btn-start">NEXT</a>
                    </div>
                </div>
                <!-- button next -->                
            </form>
        </div>
    </div>
</div>