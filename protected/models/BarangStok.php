<?php

/**
 * This is the model class for table "goods_stock".
 *
 * The followings are the available columns in table 'goods_stock':
 * @property integer $id
 * @property string $goods_code
 * @property integer $type_id
 * @property integer $brand_id
 * @property string $name
 * @property string $color
 * @property string $size
 * @property string $material
 * @property double $quantity
 * @property double $rest
 * @property string $purchase_price
 * @property string $selling_price
 * @property integer $status
 */
class BarangStok extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'goods_stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, brand_id, name, quantity, purchase_price, selling_price', 'required'),
			array('type_id, brand_id, details, status', 'numerical', 'integerOnly'=>true),
			array('quantity', 'numerical'),
			array('goods_code, color, size', 'length', 'max'=>100),
			array('name, material, kind', 'length', 'max'=>255),
			array('purchase_price, selling_price', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, goods_code, type_id, brand_id, details, kind, name, color, size, material, quantity, purchase_price, selling_price, status', 'safe', 'on'=>'search'),
		);
	}

	public function merekList()
	{
	 $models = BarangMerek::model()->findAll(array('condition' => 'type_id = ' . $this->type_id, 'order'=> 'type_id'));

	 foreach ($models as $model)
	 $_items[$model->id] = $model->name;

	 return $_items;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Tipe' => array(self::BELONGS_TO, 'BarangTipe', 'type_id'),							
			'Merek' => array(self::BELONGS_TO, 'BarangMerek', 'brand_id'),							
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'goods_code' => 'Kode Barang',
			'type_id' => 'Tipe Barang',
			'brand_id' => 'Merek Barang',
			'name' => 'Nama Barang',
			'details' => 'Detail',
			'kind' => 'Jenis',
			'color' => 'Warna',
			'size' => 'Ukuran',
			'material' => 'Bahan',
			'quantity' => 'stok',
			'purchase_price' => 'Harga Distributor',
			'selling_price' => 'Harga Jual',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('goods_code',$this->goods_code,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('kind',$this->kind,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('material',$this->material,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('purchase_price',$this->purchase_price,true);
		$criteria->compare('selling_price',$this->selling_price,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarangStok the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateKode($data){
		$_i = $data.date("ymd");
		$_left = $_i;
		$_first = "0001";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
				array(
					"select"=>"goods_code",
					"condition" => "left(goods_code, " . $_len . ") = :_left",
					"params" => array(":_left" => $_left),
					"order" => "goods_code DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->goods_code, $_len);
			$_no++;
			$_no = substr("0000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}

	public static function rupiah($data){
		return Yii::app()->numberFormatter->format("Rp ###,###,###", $data);
	}		

	public static function status($data){
		if ($data==0)
		{
			return "Baru";
		}
		else if ($data==1)
		{
			return "Habis";
		}
		else if ($data==2)
		{
			return "Pesanan";
		}
	}

	public static function kind($data){
		if ($data=="")
		{
			return "-";
		}
		else
		{
			return $data;
		}
	}	

	public static function color($data){
		if ($data=="")
		{
			return "-";
		}
		else
		{
			return $data;
		}
	}	

	public static function size($data){
		if ($data=="")
		{
			return "-";
		}
		else
		{
			return $data;
		}
	}	

	public static function material($data){
		if ($data=="")
		{
			return "-";
		}
		else
		{
			return $data;
		}
	}
}
