<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	
</head>
<style>
	.container{
		height:550px;
		width: 1650px;
	}

	.mytab{
		height: 17px;
		width: 1450px;
		margin-left: 0px;
		background-color: #20B2AA;
	}


</style>
<body>

            <div id="topnav">
            </div>
            <div id="header" style="background-color: #66CDAA;">
                <div id="logo" style="display: inline-flex; background-color: #66CDAA;">
                    <div style="margin-right: 10px;">
                        <img width="95px" height="73px" src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png"></img>
                    </div>
                    <div>
                   		<h1 style="display: inline">Sistem Aplikasi Validasi Data Impor</h1>
                        <h4>Subdirektorat Statistik Impor BPS-RI</h4> 
                                                
                    </div>
                </div>

<body>

<div class="container" id="page">

	
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<!-- footer -->

</div>
<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Badan Pusat Statistik 
		<br>All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- page -->

</body>
</html>
