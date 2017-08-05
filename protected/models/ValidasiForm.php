<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ValidasiForm extends CFormModel
{
	public $dari_tanggal;
	public $sampai_tanggal;
	public $neg_Asal;
	public $nama_prov;
	public $namaPelbong;
	public $jenisKom;
	public $HS2;
	public $nourut;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// semua attriubute required
			array('neg_Asal, nama_prov, namaPelbong, jenisKom, HS2', 'required'),
		);
	}


	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'neg_asal'=>'Negara Asal',
			'nama_prov'=>'Provinsi Tujuan',
			'pel_bong'=>'Pelabuhan Bongkar',
			'jenisKom'=>'Jenis komoditas',
			'HS2'=>'Jenis komoditas HS',
			''
		);
	}
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function validasi()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}

	public function getTypeOptions()
 {
      return CHtml::listData(Type::model()->findAll(),'id','name');
 }
 
}
