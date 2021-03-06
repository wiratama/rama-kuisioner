<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php
    $cs        = Yii::app()->clientScript;
    $themePath = Yii::app()->theme->baseUrl;

    $cs->registerCssFile($themePath . '/assets/css/bootstrap.css');
    $cs->registerCssFile($themePath . '/assets/css/font-awesome.css');
    $cs->registerCssFile($themePath . '/assets/css/style.css');

    $cs->registerCoreScript('jquery', CClientScript::POS_END);
    $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
    $cs->registerScriptFile($themePath . '/assets/js/bootstrap.js', CClientScript::POS_END);
    // $cs->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
    ?>
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php if (!Yii::app()->backendUser->isGuest) { ?>
                    <?php echo Yii::app()->backendUser->name; ?> ( <a href="<?php echo Yii::app()->createUrl('site/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log out</a> )
                <?php }  else { ?>
                    <a href="<?php echo Yii::app()->createUrl('site/logout');?>"><i class="fa fa-sign-in"></i> Log in</a>
                <?php } ?>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <?php if (!Yii::app()->backendUser->isGuest) { ?>
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo Yii::app()->createUrl('site/index');?>">Dashboard</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('question/admin');?>">Question</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('store/admin');?>">Store</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('customer/admin');?>">Customer</a></li>
                            <!-- <li><a href="<?php //echo Yii::app()->createUrl('surveyquestionanswer/admin');?>">Survey</a></li> -->
                            <li><a href="<?php echo Yii::app()->createUrl('settings/index');?>">Settings</a></li>
                        </ul>
                        <?php }  else { ?>
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li>                                
                                <a href="<?php echo Yii::app()->createUrl('site/login');?>">Log in</a>
                            </li>
                        </ul>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    
    <div class="content-wrapper">
    	<div class="container">            
       		<?php echo $content; ?>
    	</div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 YourCompany
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->    
    
    <script type="text/javascript">
	jQuery(function() {
	 	jQuery('#menu-top li a').each(function() {
	    	if (jQuery(this).attr('href')  ===  window.location.pathname) {
	    		jQuery(this).addClass('menu-top-active');
	    	}
	 	});
	});  
    </script>
</body>
</html>
<!--  -->