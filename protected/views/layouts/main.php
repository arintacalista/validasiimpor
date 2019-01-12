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
.container {
    height:650px;
    width: 100%
}

.mytab {
    background-color: #4682B4;
    height: 17px;
    margin-left: 0px;
}
</style>
<body>

            <div id="topnav">
            </div>
            <div id="header" style="background-color: #AFEEEE;">
                <div id="logo" style="display: inline-flex; background-color: #AFEEEE;">
                    <div style="margin-right: 10px;">
                        <img width="95px" height="73px" src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png"></img>
                    </div>
                    <div>
                   		<h1 style="display: inline">Sistem Monitoring Survei (SMS)</h1>
                        <h4>BPS Kota Samarinda</h4>

                    </div>
                </div>

<body>

<div class="container" id="page">


	 <div id="mainmenu" style="margin-top: -6px;margin-left: -1px;">
		<?php $this->widget('zii.widgets.CMenu',array(
		'htmlOptions'=> array('class'=>'mytab'),
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/home')),
                ['label' => 'Jenis Survei', 'url' => ['/jenisSurvei']],
                ['label' => 'Kegiatan', 'url' => ['/kegiatan']],
                ['label' => 'Pic', 'url' => ['/pic']],
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				/*array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),*/
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>  <!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<!-- footer -->

</div><!-- page -->
<div id="footer">


		Copyright &copy; <?php echo date('Y'); ?> by Badan Pusat Statistik Kota Samarinda
		<br>All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>

</body>
</html>
