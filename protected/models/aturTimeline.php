<?php

/**
 * This is the model class for table "Upload".
 *
 * The followings are the available columns in table 'Upload':
 * @property integer $idHS
 * @property string $hs
 * @property integer $berat
 * @property integer $nilai
 * @property integer $waktu
 * @property string $neg_asal
 * @property string $pelbong
 * @property string $cifkg
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hs, berat, nilai, waktu, neg_asal, pelbong, cifkg', 'required'),
			array('berat, nilai, waktu', 'numerical', 'integerOnly'=>true),
			array('hs', 'length', 'max'=>10),
			array('neg_asal', 'length', 'max'=>2),
			array('pelbong', 'length', 'max'=>5),
			array('cifkg', 'length', 'max'=>8),
			array('file','file', 'types'=>'sql','allowEmpty'=> true,'safe'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHS, hs, berat, nilai, waktu, neg_asal, pelbong, cifkg', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHS' => 'Id Hs',
			'hs' => 'Hs',
			'berat' => 'Berat',
			'nilai' => 'Nilai',
			'waktu' => 'Waktu',
			'neg_asal' => 'Neg Asal',
			'pelbong' => 'Pelbong',
			'cifkg' => 'Cifkg',
			'file' => 'File',
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

		$criteria->compare('idHS',$this->idHS);
		$criteria->compare('hs',$this->hs,true);
		$criteria->compare('berat',$this->berat);
		$criteria->compare('nilai',$this->nilai);
		$criteria->compare('waktu',$this->waktu);
		$criteria->compare('neg_asal',$this->neg_asal,true);
		$criteria->compare('pelbong',$this->pelbong,true);
		$criteria->compare('cifkg',$this->cifkg,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function Upload()
	{}
}
