<?php

/**
 * This is the model class for table "patient".
 *
 * The followings are the available columns in table 'patient':
 * @property integer $id
 * @property string $patient_code
 * @property string $name
 * @property string $date
 * @property integer $gender
 * @property string $address
 * @property string $phone_number
 * @property integer $bpjs
 * @property string $bpjs_number
 * @property integer $recomendation
 */
class Patient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_code, name, date, gender, address, phone_number, bpjs, recomendation', 'required'),
			array('gender, bpjs, recomendation', 'numerical', 'integerOnly'=>true),
			array('patient_code, name', 'length', 'max'=>255),
			array('phone_number', 'length', 'max'=>12),
			array('bpjs_number', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, patient_code, name, date, gender, address, phone_number, bpjs, bpjs_number, recomendation', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'patient_code' => 'Kode Pasien',
			'name' => 'Nama Pasien',
			'date' => 'Tanggal Lahir',
			'gender' => 'Jenis Kelamin',
			'address' => 'Alamat',
			'phone_number' => 'Nomor Telepon',
			'bpjs' => 'BPJS',
			'bpjs_number' => 'Nomor BPJS',
			'recomendation' => 'Rekomendasi',
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
		$criteria->compare('patient_code',$this->patient_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('bpjs',$this->bpjs);
		$criteria->compare('bpjs_number',$this->bpjs_number,true);
		$criteria->compare('recomendation',$this->recomendation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Patient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateKode(){
		$_i = "PS".date("dym");
		$_left = $_i;
		$_first = "0001";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
				array(
					"select"=>"patient_code",
					"condition" => "left(patient_code, " . $_len . ") = :_left",
					"params" => array(":_left" => $_left),
					"order" => "patient_code DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->patient_code, $_len);
			$_no++;
			$_no = substr("0000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}

	public static function gender($data){
		if ($data==0)
		{
			return "Laki-laki";
		}
		else if ($data==1)
		{
			return "Perempuan";
		}
	}

	public static function bpjs($data){
		if ($data==0)
		{
			return "Pakai BPJS";
		}
		else if ($data==1)
		{
			return "Non-BPJS";
		}
	}

	public static function nObpjs($data){
		if ($data==0)
		{
			return $data;
		}
		else if ($data==1)
		{
			return "-";
		}
	}

	public static function recomendation($data){
		if ($data==0)
		{
			return "Rekomendasi Dari Dokter";
		}
		else if ($data==1)
		{
			return "Tidak Pakai Rekomendasi";
		}
	}

	public static function bulan($data){
		$bulan = date('m',strtotime($data));
		switch ($bulan) {
			case 1 : $bulan="Januari";
				break;
			case 2 : $bulan="Februari";
				break;
			case 3 : $bulan="Maret";
				break;				
			case 4 : $bulan="April";
				break;				
			case 5 : $bulan="Mei";
				break;
			case 6 : $bulan="Juni";
				break;				
			case 7 : $bulan="Juli";
				break;
			case 8 : $bulan="Agustus";
				break;				
			case 9 : $bulan="September";
				break;				
			case 10 : $bulan="Oktober";
				break;				
			case 11 : $bulan="November";
				break;				
			case 12 : $bulan="Desember";
				break;				
		}
		$datee = date('d',strtotime($data)).' '.$bulan.' '.date('Y',strtotime($data));
		return $datee;
	}			
}