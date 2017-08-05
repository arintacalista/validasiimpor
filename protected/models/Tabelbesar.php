<?php

/**
 * This is the model class for table "tabelbesar".
 *
 * The followings are the available columns in table 'tabelbesar':
 * @property integer $NORUT
 * @property string $KD
 * @property string $DESK
 * @property string $TIPE
 * @property string $JENIS
 * @property string $HS2
 * @property string $HS
 * @property string $K_NEGARA
 * @property string $NEG_ASAL
 * @property string $KD_PROV
 * @property string $K_PELB
 * @property string $PEL_BONG
 * @property string $B2014C
 * @property string $N2014C
 * @property string $B0115
 * @property string $N0115
 * @property string $B0215
 * @property string $N0215
 * @property string $B0315
 * @property string $N0315
 * @property string $B0315C
 * @property string $N0315C
 * @property string $B0415
 * @property string $N0415
 * @property string $B0515
 * @property string $N0515
 * @property string $B0615
 * @property string $N0615
 * @property string $B0715
 * @property string $N0715
 * @property string $B0815
 * @property string $N0815
 * @property string $B0915
 * @property string $N0915
 * @property string $B1015
 * @property string $N1015
 * @property string $B1115
 * @property string $N1115
 * @property string $B1215
 * @property string $N1215
 * @property string $B2015
 * @property string $N2015
 * @property string $B0116
 * @property string $N0116
 * @property string $B0216
 * @property string $N0216
 * @property string $B0316S
 * @property string $N0316S
 * @property string $B0316SC
 * @property string $N0316SC
 */
class Tabelbesar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tabelbesar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KD, TIPE', 'length', 'max'=>3),
			array('DESK', 'length', 'max'=>30),
			array('JENIS, K_PELB, PEL_BONG', 'length', 'max'=>5),
			array('HS2, NEG_ASAL', 'length', 'max'=>2),
			array('HS, KD_PROV', 'length', 'max'=>10),
			array('K_NEGARA', 'length', 'max'=>8),
			array('B2014C, N2014C, B0115, N0115, B0215, N0215, B0315, N0315, B0315C, N0315C, B0415, N0415, B0515, N0515, B0615, N0615, B0715, N0715, B0815, N0815, B0915, N0915, B1015, N1015, B1115, N1115, B1215, N1215, B2015, N2015, B0116, N0116, B0216, N0216, B0316S, N0316S, B0316SC, N0316SC', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NORUT, KD, DESK, TIPE, JENIS, HS2, HS, K_NEGARA, NEG_ASAL, KD_PROV, K_PELB, PEL_BONG, B2014C, N2014C, B0115, N0115, B0215, N0215, B0315, N0315, B0315C, N0315C, B0415, N0415, B0515, N0515, B0615, N0615, B0715, N0715, B0815, N0815, B0915, N0915, B1015, N1015, B1115, N1115, B1215, N1215, B2015, N2015, B0116, N0116, B0216, N0216, B0316S, N0316S, B0316SC, N0316SC', 'safe', 'on'=>'search'),
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
			'NORUT' => 'Norut',
			'KD' => 'Kd',
			'DESK' => 'Desk',
			'TIPE' => 'Tipe',
			'JENIS' => 'Jenis',
			'HS2' => 'Hs2',
			'HS' => 'Hs',
			'K_NEGARA' => 'K Negara',
			'NEG_ASAL' => 'Neg Asal',
			'KD_PROV' => 'Kd Prov',
			'K_PELB' => 'K Pelb',
			'PEL_BONG' => 'Pel Bong',
			'B2014C' => 'B2014 C',
			'N2014C' => 'N2014 C',
			'B0115' => 'B0115',
			'N0115' => 'N0115',
			'B0215' => 'B0215',
			'N0215' => 'N0215',
			'B0315' => 'B0315',
			'N0315' => 'N0315',
			'B0315C' => 'B0315 C',
			'N0315C' => 'N0315 C',
			'B0415' => 'B0415',
			'N0415' => 'N0415',
			'B0515' => 'B0515',
			'N0515' => 'N0515',
			'B0615' => 'B0615',
			'N0615' => 'N0615',
			'B0715' => 'B0715',
			'N0715' => 'N0715',
			'B0815' => 'B0815',
			'N0815' => 'N0815',
			'B0915' => 'B0915',
			'N0915' => 'N0915',
			'B1015' => 'B1015',
			'N1015' => 'N1015',
			'B1115' => 'B1115',
			'N1115' => 'N1115',
			'B1215' => 'B1215',
			'N1215' => 'N1215',
			'B2015' => 'B2015',
			'N2015' => 'N2015',
			'B0116' => 'B0116',
			'N0116' => 'N0116',
			'B0216' => 'B0216',
			'N0216' => 'N0216',
			'B0316S' => 'B0316 S',
			'N0316S' => 'N0316 S',
			'B0316SC' => 'B0316 Sc',
			'N0316SC' => 'N0316 Sc',
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

		$criteria->compare('NORUT',$this->NORUT);
		$criteria->compare('KD',$this->KD,true);
		$criteria->compare('DESK',$this->DESK,true);
		$criteria->compare('TIPE',$this->TIPE,true);
		$criteria->compare('JENIS',$this->JENIS,true);
		$criteria->compare('HS2',$this->HS2,true);
		$criteria->compare('HS',$this->HS,true);
		$criteria->compare('K_NEGARA',$this->K_NEGARA,true);
		$criteria->compare('NEG_ASAL',$this->NEG_ASAL,true);
		$criteria->compare('KD_PROV',$this->KD_PROV,true);
		$criteria->compare('K_PELB',$this->K_PELB,true);
		$criteria->compare('PEL_BONG',$this->PEL_BONG,true);
		$criteria->compare('B2014C',$this->B2014C,true);
		$criteria->compare('N2014C',$this->N2014C,true);
		$criteria->compare('B0115',$this->B0115,true);
		$criteria->compare('N0115',$this->N0115,true);
		$criteria->compare('B0215',$this->B0215,true);
		$criteria->compare('N0215',$this->N0215,true);
		$criteria->compare('B0315',$this->B0315,true);
		$criteria->compare('N0315',$this->N0315,true);
		$criteria->compare('B0315C',$this->B0315C,true);
		$criteria->compare('N0315C',$this->N0315C,true);
		$criteria->compare('B0415',$this->B0415,true);
		$criteria->compare('N0415',$this->N0415,true);
		$criteria->compare('B0515',$this->B0515,true);
		$criteria->compare('N0515',$this->N0515,true);
		$criteria->compare('B0615',$this->B0615,true);
		$criteria->compare('N0615',$this->N0615,true);
		$criteria->compare('B0715',$this->B0715,true);
		$criteria->compare('N0715',$this->N0715,true);
		$criteria->compare('B0815',$this->B0815,true);
		$criteria->compare('N0815',$this->N0815,true);
		$criteria->compare('B0915',$this->B0915,true);
		$criteria->compare('N0915',$this->N0915,true);
		$criteria->compare('B1015',$this->B1015,true);
		$criteria->compare('N1015',$this->N1015,true);
		$criteria->compare('B1115',$this->B1115,true);
		$criteria->compare('N1115',$this->N1115,true);
		$criteria->compare('B1215',$this->B1215,true);
		$criteria->compare('N1215',$this->N1215,true);
		$criteria->compare('B2015',$this->B2015,true);
		$criteria->compare('N2015',$this->N2015,true);
		$criteria->compare('B0116',$this->B0116,true);
		$criteria->compare('N0116',$this->N0116,true);
		$criteria->compare('B0216',$this->B0216,true);
		$criteria->compare('N0216',$this->N0216,true);
		$criteria->compare('B0316S',$this->B0316S,true);
		$criteria->compare('N0316S',$this->N0316S,true);
		$criteria->compare('B0316SC',$this->B0316SC,true);
		$criteria->compare('N0316SC',$this->N0316SC,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tabelbesar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
