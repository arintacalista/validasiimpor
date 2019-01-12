<?php
/* @var $this SurveiDokumenController */
/* @var $model SurveiDokumen */

$this->breadcrumbs=array(
	'Survei Dokumens'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SurveiDokumen', 'url'=>array('index')),
	array('label'=>'Create SurveiDokumen', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#survei-dokumen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Survei Dokumens</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'survei-dokumen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		[
            'filter' => CHtml::listData(JenisSurvei::model()->orderByNama()->findAll(), 'id', 'nama'),
            'name' => 'id_jenis_survei',
            'value' => '$data->idJenisSurvei->nama',
        ],
        [
            'filter' => CHtml::listData(Kegiatan::model()->orderByNama()->findAll(), 'id', 'nama'),
            'name' => 'id_kegiatan',
            'value' => '$data->idKegiatan->nama',
        ],
		[
            'filter' => CHtml::listData(Pic::model()->orderByNama()->findAll(), 'id', 'nama'),
            'name' => 'id_pic',
            'value' => '$data->idPic->nama',
        ],
		'banyak_dokumen',
		'dokumen_bersih',
		/*
		'dokumen_salah',
		'persentase_selesai',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
