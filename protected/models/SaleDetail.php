<?php

/**
 * This is the model class for table "sale_detail".
 *
 * The followings are the available columns in table 'sale_detail':
 * @property integer $id
 * @property integer $master_sale_id
 * @property integer $goods_id
 * @property string $amount_of_purchase
 * @property string $unit_price
 * @property string $total
 */
class SaleDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sale_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('master_sale_id, goods_id, amount_of_purchase, unit_price, total', 'required'),
			array('master_sale_id, goods_id', 'numerical', 'integerOnly'=>true),
			array('amount_of_purchase, unit_price, total', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, master_sale_id, goods_id, amount_of_purchase, unit_price, total', 'safe', 'on'=>'search'),
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
			'Barang' => array(self::BELONGS_TO, 'BarangStok', 'goods_id'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'master_sale_id' => 'Master Id',
			'goods_id' => 'Nama Barang',
			'amount_of_purchase' => 'Qty',
			'unit_price' => 'Harga Item',
			'total' => 'Total',
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
		$criteria->compare('master_sale_id',$this->master_sale_id);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('amount_of_purchase',$this->amount_of_purchase,true);
		$criteria->compare('unit_price',$this->unit_price,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}	

	public function getDetail($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('master_sale_id',$id);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('amount_of_purchase',$this->amount_of_purchase,true);
		$criteria->compare('unit_price',$this->unit_price,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SaleDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
