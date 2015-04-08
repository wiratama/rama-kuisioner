<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Guest Comment : Rama Restaurants Bali</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.theme.css">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/stickyfooter.css">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet">
        <script>
			var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
			if(!oldieCheck) {
				document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-2.1.0.min.js"><\/script>');
			} else {
				document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.0.min.js"><\/script>');
			}
		</script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" class="logo img-responsive center-block">
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Rama Restaurants Bali © Copyright 2014
                    <br>Powered by Alamaya®
                </div>
            </div>
        </div>
    </footer>
        <script type="text/javascript">
        function setLang (id_lang) {
            $.ajax({
                url: '<?php echo Yii::app()->createAbsoluteUrl("site/setlang");?>',
                type: 'post',
                data: 'lang=' + id_lang,
                dataType: 'json',
                success: function(response) {
                    if (response==0000) {
                        window.location.reload();
                    }
                }
            });
        }
        </script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
    </body>
</html>