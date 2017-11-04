<?php

/**
 * This is the model class for table "outcoming_goods".
 *
 * The followings are the available columns in table 'outcoming_goods':
 * @property integer $id
 * @property string $request_code
 * @property string $date
 * @property integer $user_id
 * @property integer $store_id
 * @property string $goods_name
 * @property double $amount
 */
class BarangKeluar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'outcoming_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('request_code, date, user_id, store_id, goods_name, amount', 'required'),
			array('user_id, store_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('request_code, goods_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, request_code, date, user_id, store_id, goods_name, amount', 'safe', 'on'=>'search'),
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
			'request_code' => 'Request Code',
			'date' => 'Date',
			'user_id' => 'User',
			'store_id' => 'Store',
			'goods_name' => 'Goods Name',
			'amount' => 'Amount',
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
		$criteria->compare('request_code',$this->request_code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('goods_name',$this->goods_name,true);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarangKeluar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function monthReport($data){
		$nilai = Yii::app()->db->createCommand('
			SELECT COUNT(id) FROM outcoming_goods WHERE (Month(date)='.$data.') 
			AND (YEAR(date)='.date('Y').') 
			GROUP BY (Month(date)='.$data.')
			')->queryScalar();

		if($nilai==""){
			return "0";
		}else{
			return $nilai;
		}
	}
}
