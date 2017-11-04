<?php

/**
 * This is the model class for table "incoming_goods_detail".
 *
 * The followings are the available columns in table 'incoming_goods_detail':
 * @property integer $id
 * @property string $incoming_code
 * @property string $goods_id
 * @property double $amount
 * @property integer $status
 */
class BarangMasukDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'incoming_goods_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goods_id, amount', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('incoming_code, goods_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incoming_code, goods_id, amount, status', 'safe', 'on'=>'search'),
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
			'incoming_code' => 'Kode Barang Masuk',
			'goods_id' => 'Nama Barang',
			'amount' => 'Jumlah',
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
		$criteria->compare('incoming_code',$this->incoming_code,true);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getDetail($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('incoming_code',$id);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarangMasukDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function monthReport($data){
		$nilai = Yii::app()->db->createCommand('
			SELECT COUNT(incoming_goods_detail.id) FROM incoming_goods_detail LEFT JOIN incoming_goods 
			ON incoming_goods_detail.incoming_code = incoming_goods.incoming_code WHERE (Month(incoming_goods.date)='.$data.') 
			AND (YEAR(incoming_goods.date)='.date('Y').') 
			GROUP BY (Month(incoming_goods.date)='.$data.')
			')->queryScalar();

		if($nilai==""){
			return "0";
		}else{
			return $nilai;
		}
	}
}
