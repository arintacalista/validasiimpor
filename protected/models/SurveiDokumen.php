<?php

/**
 * This is the model class for table "survei_dokumen".
 *
 * The followings are the available columns in table 'survei_dokumen':
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis_survei
 * @property string $tanggal_mulai
 * @property string $tanggal_akhir
 * @property integer $banyak_dokumen
 * @property integer $dokumen_bersih
 * @property integer $dokumen_salah
 * @property integer $id_pic
 * @property integer $persentase_selesai
 *
 * The followings are the available model relations:
 * @property JenisSurvei $idJenisSurvei
 * @property Pic $idPic
 */
class SurveiDokumen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'survei_dokumen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, id_jenis_survei, tanggal_mulai, tanggal_akhir, banyak_dokumen, dokumen_bersih, dokumen_salah, id_pic', 'required'),
			array('id_jenis_survei, banyak_dokumen, dokumen_bersih, dokumen_salah, id_pic, persentase_selesai', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, id_jenis_survei, tanggal_mulai, tanggal_akhir, banyak_dokumen, dokumen_bersih, dokumen_salah, id_pic, persentase_selesai', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idJenisSurvei' => array(self::BELONGS_TO, 'JenisSurvei', 'id_jenis_survei'),
			'idPic' => array(self::BELONGS_TO, 'Pic', 'id_pic'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'id_jenis_survei' => 'Id Jenis Survei',
			'tanggal_mulai' => 'Tanggal Mulai',
			'tanggal_akhir' => 'Tanggal Akhir',
			'banyak_dokumen' => 'Banyak Dokumen',
			'dokumen_bersih' => 'Dokumen Bersih',
			'dokumen_salah' => 'Dokumen Salah',
			'id_pic' => 'Id Pic',
			'persentase_selesai' => 'Persentase Selesai',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_jenis_survei',$this->id_jenis_survei);
		$criteria->compare('tanggal_mulai',$this->tanggal_mulai,true);
		$criteria->compare('tanggal_akhir',$this->tanggal_akhir,true);
		$criteria->compare('banyak_dokumen',$this->banyak_dokumen);
		$criteria->compare('dokumen_bersih',$this->dokumen_bersih);
		$criteria->compare('dokumen_salah',$this->dokumen_salah);
		$criteria->compare('id_pic',$this->id_pic);
		$criteria->compare('persentase_selesai',$this->persentase_selesai);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveiDokumen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
