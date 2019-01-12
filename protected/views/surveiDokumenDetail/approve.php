<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */

$this->breadcrumbs=array(
	'Survei Dokumen Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SurveiDokumenDetail', 'url'=>array('index')),
	array('label'=>'Create SurveiDokumenDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#survei-dokumen-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Survei Dokumen Details</h1>

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
	'id'=>'survei-dokumen-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		[
            'filter' => CHtml::listData(SurveiDokumen::model()->findAll(), 'id', 'jenisSurveiAndKegiatanAndPic'),
            'name' => 'id_survei_dokumen',
            'value' => '$data->idSurveiDokumen->jenisSurveiAndKegiatanAndPic',
        ],
        [
            'filter' => CHtml::listData(User::model()->orderByUsername()->findAll(), 'id', 'username'),
            'name' => 'id_user',
            'value' => '$data->idUser->username',
        ],
		'dokumen_bersih',
		'dokumen_salah',
		'tanggal_dibuat',
		/*
		'disetujui',
		'created_at',
		*/
		[
            'class' => 'CButtonColumn',
            'template' => '{approve}',
            'buttons' => [
                'approve' => [
                    'label' => 'Setuju',
                    'url' => function ($data) {
                        return $this->createUrl('/surveiDokumenDetail/approving', ['id' => $data->id]);
                    },
                ],
            ],
        ],
	),
)); ?>
