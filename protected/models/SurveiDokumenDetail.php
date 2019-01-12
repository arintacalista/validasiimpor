<?php

/**
 * This is the model class for table "survei_dokumen_detail".
 *
 * The followings are the available columns in table 'survei_dokumen_detail':
 * @property integer $id
 * @property integer $id_survei_dokumen
 * @property integer $id_user
 * @property integer $dokumen_bersih
 * @property integer $dokumen_salah
 * @property string $tanggal_dibuat
 * @property integer $disetujui
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property SurveiDokumen $idSurveiDokumen
 * @property User $idUser
 */
class SurveiDokumenDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'survei_dokumen_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_survei_dokumen, id_user, dokumen_bersih, dokumen_salah', 'required'),
			array('id_survei_dokumen, id_user, dokumen_bersih, dokumen_salah, disetujui', 'numerical', 'integerOnly'=>true),
			array('tanggal_dibuat, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_survei_dokumen, id_user, dokumen_bersih, dokumen_salah, tanggal_dibuat, disetujui, created_at', 'safe', 'on'=>'search'),
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
			'idSurveiDokumen' => array(self::BELONGS_TO, 'SurveiDokumen', 'id_survei_dokumen'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_survei_dokumen' => 'Id Survei Dokumen',
			'id_user' => 'Id User',
			'dokumen_bersih' => 'Dokumen Bersih',
			'dokumen_salah' => 'Dokumen Salah',
			'tanggal_dibuat' => 'Tanggal Dibuat',
			'disetujui' => 'Disetujui',
			'created_at' => 'Created At',
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
		$criteria->compare('id_survei_dokumen',$this->id_survei_dokumen);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('dokumen_bersih',$this->dokumen_bersih);
		$criteria->compare('dokumen_salah',$this->dokumen_salah);
		$criteria->compare('tanggal_dibuat',$this->tanggal_dibuat,true);
		$criteria->compare('disetujui',$this->disetujui);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveiDokumenDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
