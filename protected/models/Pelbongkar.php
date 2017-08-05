<?php

/**
 * This is the model class for table "pelbongkar".
 *
 * The followings are the available columns in table 'pelbongkar':
 * @property integer $idPel
 * @property integer $kodePelbong
 * @property string $namaPelbong
 * @property string $id_prov
 *
 * The followings are the available model relations:
 * @property MasterProv $idProv
 */
class Pelbongkar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelbongkar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kodePelbong, namaPelbong, id_prov', 'required'),
			array('kodePelbong', 'numerical', 'integerOnly'=>true),
			array('namaPelbong', 'length', 'max'=>7),
			array('id_prov', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPel, kodePelbong, namaPelbong, id_prov', 'safe', 'on'=>'search'),
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
			'idProv' => array(self::BELONGS_TO, 'MasterProv', 'id_prov'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPel' => 'Id Pel',
			'kodePelbong' => 'Kode Pelbong',
			'namaPelbong' => 'Nama Pelbong',
			'id_prov' => 'Id Prov',
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

		$criteria->compare('idPel',$this->idPel);
		$criteria->compare('kodePelbong',$this->kodePelbong);
		$criteria->compare('namaPelbong',$this->namaPelbong,true);
		$criteria->compare('id_prov',$this->id_prov,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pelbongkar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
