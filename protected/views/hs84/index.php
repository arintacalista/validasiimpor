<head>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

<!-- <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->

</head>

<?php


$this->pageTitle=Yii::app()->name;
?>
<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
<br>
<h1 class="center">Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<br>
<br>


<div id="line" style 'width:1200px;margin-left:50px'></div>
<script type="text/javascript">
// Get the CSV and create the chart
$.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=analytics.csv&callback=?', function (csv) {
<?php
 	$this->widget('ext.highchart.highcharts.HighchartsWidget', array([
    'clientOptions' => [
        'chart' => [

	        'data'=> [
	            'csv'=> 'csv'
	        ],

	        'title'=> [
	            'text'=> 'Daily visits at www.highcharts.com'
	        ],

	        'subtitle'=> [
	            'text'=> 'Source=> Google Analytics'
	        ],

	        'xAxis'=> [
	            'tickInterval'=> 7 * 24 * 3600 * 1000, // one week
	            'tickWidth'=> 0,
	            'gridLineWidth'=> 1,
	            'labels'=> [
	                'align'=> 'left',
	                'x'=> 3,
	                'y'=> -3
	            ]
	        ],

	        'yAxis'=> [[ // left y axis
	            'title'=> [
	                'text'=> null
	            ],
	            'labels'=> [
	                'align'=> 'left',
	                'x'=> 3,
	                'y'=> 16,
	                'format'=> '[value=>.,0f]'
	            ],
	            'showFirstLabel'=> false
	        ], [ // right y axis
	            'linkedTo'=> 0,
	            'gridLineWidth'=> 0,
	            'opposite'=> true,
	            'title'=> [
	                'text'=> null
	            ],
	            'labels'=> [
	                'align'=> 'right',
	                'x'=> -3,
	                'y'=> 16,
	                'format'=> '[value=>.,0f]'
	            ],
	            'showFirstLabel'=> false
	        ]],

	        'legend'=> [
	            'align'=> 'left',
	            'verticalAlign'=> 'top',
	            'y'=> 20,
	            'floating'=> true,
	            'borderWidth'=> 0
	        ],

	        'tooltip'=> [
	            'shared'=> true,
	            'crosshairs'=> true
	        ],

	        'plotOptions'=> [
	            'series'=> [
	                'cursor'=> 'pointer',
	                'point'=> [
	                    'events'=> [
	                        'click'=> function /*(e)*/ (
	                            hs.htmlExpand(null, [
	                                'pageOrigin'=> [
	                                    'x'=> e.pageX || e.clientX
	                                    'y'=> e.pageY || e.clientY
	                                ],
	                                'headingText'=> this.series.name,
	                                'maincontentText'=> Highcharts.dateFormat('%A, %b %e, %Y', this.x) + '=><br/> ' +
	                                    this.y + ' visits',
	                                'width'=> 200
	                            ]))
	                        ]
	                    ]
	                ],
	                'marker'=> [
	                    'lineWidth'=> 1
	                ],
	            ],
	        ],

	        'series'=> [[
	            'name'=> 'All visits',
	            'lineWidth'=> 4,
	            'marker'=> [
	                'radius'=> 4
	            ],
	        ], [
	            'name'=> 'New visitors'
	        ]]
    ])
]))
?>
 <?php $this->endWidget(); ?>