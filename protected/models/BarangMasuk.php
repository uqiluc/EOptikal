<?php

/**
 * This is the model class for table "incoming_goods".
 *
 * The followings are the available columns in table 'incoming_goods':
 * @property string $incoming_code
 * @property string $date
 * @property string $supplier_name
 */
class BarangMasuk extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'incoming_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incoming_code, date', 'required'),
			array('supplier_id', 'numerical', 'integerOnly'=>true),			
			array('incoming_code', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('incoming_code, date, supplier_id', 'safe', 'on'=>'search'),
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
			'Distributor' => array(self::BELONGS_TO, 'Distributor', 'supplier_id'),		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'incoming_code' => 'Kode Barang Masuk',
			'date' => 'Waktu Transaksi',
			'supplier_id' => 'Nama Distributor',
			'user_id' => 'Pembuat Faktur',
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

		$criteria->compare('incoming_code',$this->incoming_code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('supplier_id',$this->supplier_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarangMasuk the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateID(){
		$_i = "BM".date("ymd");
		$_left = $_i;
		$_first = "0001";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
				array(
					"select"=>"incoming_code",
					"condition" => "left(incoming_code, " . $_len . ") = :_left",
					"params" => array(":_left" => $_left),
					"order" => "incoming_code DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->incoming_code, $_len);
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
}
