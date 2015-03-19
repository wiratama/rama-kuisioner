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
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css" rel="stylesheet" />
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
                    login / logout
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
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo Yii::app()->createUrl('site/index');?>">Dashboard</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('question/index');?>">Question</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('answer/index');?>">Answer</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('store/index');?>">Store</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('customer/index');?>">Customer</a></li>
                        </ul>
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
    
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery-1.11.1.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.js"></script>
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
