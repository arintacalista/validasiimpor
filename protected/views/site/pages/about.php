<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';

?>

    
	<br>
<h1>About</h1>

<p>Ini adalah <?php echo CHtml::encode(Yii::app()->name); ?></p>

 <div class="portlet-decoration">
            <div class="portlet-title"><span class="icon icon-status_online">Informasi Penggunaan <i>Sistem</i></span></div>
        </div>
        <div class="portlet-content">
            <br/>
            <h4><b>Fungsi yang tersedia di dalam <i>sistem</i> ini adalah :</b></h4>
            <ol>
                <li>Melihat deksriptif data berupa diagram pencar dan batang</li>
                <li>Melihat jumlah pencilan dalam data</li>
            </ol>
        </div>