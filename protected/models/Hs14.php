<?php

/**
 * This is the model class for table "hs14".
 *
 * The followings are the available columns in table 'hs14':
 * @property integer $idhs14
 * @property string $HS
 * @property integer $BERAT
 * @property integer $NILAI
 * @property integer $WAKTU
 * @property string $NEG_ASAL
 * @property string $PELBONG
 * @property string $CIFKG
 */
class Hs14 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hs14';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BERAT, NILAI, WAKTU', 'numerical', 'integerOnly'=>true),
			array('HS', 'length', 'max'=>10),
			array('NEG_ASAL', 'length', 'max'=>2),
			array('PELBONG', 'length', 'max'=>5),
			array('CIFKG', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idhs14, HS, BERAT, NILAI, WAKTU, NEG_ASAL, PELBONG, CIFKG', 'safe', 'on'=>'search'),
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
			'idhs14' => 'Idhs14',
			'HS' => 'Hs',
			'BERAT' => 'Berat',
			'NILAI' => 'Nilai',
			'WAKTU' => 'Waktu',
			'NEG_ASAL' => 'Neg Asal',
			'PELBONG' => 'Pelbong',
			'CIFKG' => 'Cifkg',
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

		$criteria->compare('idhs14',$this->idhs14);
		$criteria->compare('HS',$this->HS,true);
		$criteria->compare('BERAT',$this->BERAT);
		$criteria->compare('NILAI',$this->NILAI);
		$criteria->compare('WAKTU',$this->WAKTU);
		$criteria->compare('NEG_ASAL',$this->NEG_ASAL,true);
		$criteria->compare('PELBONG',$this->PELBONG,true);
		$criteria->compare('CIFKG',$this->CIFKG,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hs14 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
