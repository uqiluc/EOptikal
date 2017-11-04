<?php

/**
 * This is the model class for table "goods_request".
 *
 * The followings are the available columns in table 'goods_request':
 * @property string $request_code
 * @property string $date
 * @property integer $user_id
 * @property integer $store_id
 * @property integer $status
 */
class PermintaanBarang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'goods_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('request_code', 'required'),
			array('user_id, store_id, status', 'numerical', 'integerOnly'=>true),
			array('request_code', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('request_code, date, user_id, store_id, status', 'safe', 'on'=>'search'),
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
			'Pengguna' => array(self::BELONGS_TO, 'Pengguna', 'user_id'),						
			'place' => array(self::BELONGS_TO, 'UserBagian', 'store_id'),		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'request_code' => 'Kode Permintaan',
			'date' => 'Tanggal Permintaan',
			'user_id' => 'Penanggung Jawab',
			'store_id' => 'Toko',
			'status' => 'Status',
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

		$criteria->compare('request_code',$this->request_code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getData()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('request_code',$this->request_code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermintaanBarang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateID(){
		$_i = "PB".date("ymd");
		$_left = $_i;
		$_first = "0001";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
				array(
					"select"=>"request_code",
					"condition" => "left(request_code, " . $_len . ") = :_left",
					"params" => array(":_left" => $_left),
					"order" => "request_code DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->request_code, $_len);
			$_no++;
			$_no = substr("0000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
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

	public static function status($data){
		if ($data==0)
		{
			return "Pengajuan";
		}
		else if($data==1)
		{
			return "Proses";
		}
		else if($data==3)
		{
			return "Disetujui";
		}		
	}
}
