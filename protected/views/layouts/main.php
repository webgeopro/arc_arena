<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/index.js"></script>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
            <a href="/" title="На главную"><img src="/images/link_home.gif"></a>&nbsp;&nbsp;
            <a href="/contact" title="Написать письмо" id="aMailSend"><img src="/images/link_mail.gif"></a>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
            <?if ( 'index' == Yii::app()->controller->getAction()->getId() ):?>
                <?$this->widget('maxMenu', array('pageID'=>'', 'pageLabel'=> @$_GET['page']))?>
            <?else:?>
                <?$this->widget('maxMenu', array('pageID'=>'', 'pageLabel'=>Yii::app()->controller->getAction()->getId() ))?>
            <?endif;?>
	</div><!-- mainmenu -->

    <?php/* if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
