<?php

/**
 * This is the model class for table "goods_brand".
 *
 * The followings are the available columns in table 'goods_brand':
 * @property integer $id
 * @property string $name
 * @property string $mnemonic
 * @property integer $type_id
 */
class BarangMerek extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'goods_brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, mnemonic, type_id', 'required'),
			array('type_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('mnemonic', 'length', 'max'=>100),
			array('mnemonic', 'validasi', 'on'=>'validasi'),									
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, mnemonic, type_id', 'safe', 'on'=>'search'),
		);
	}

	public function validasi($mnemonic) 
	{
		if ($this->mnemonic == "")
		{
			$this->addError('mnemonic', 'Harap Isi mnemonic!!');
		}
		else
		{
		$connection=Yii::app()->db;  
		$sqlQuery = "select mnemonic from goods_type where mnemonic = '$this->mnemonic'";
		$command=$connection->createCommand($sqlQuery);
		$temp = $command->queryScalar();		
		
		if($this->mnemonic == $temp)
		{
			$this->addError('mnemonic', 'mnemonic sudah dipakai!!');
		}
		else
		{
			return true;
		}
		}				
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'mnemonic' => 'mnemonic',
			'type_id' => 'Type',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mnemonic',$this->mnemonic,true);
		$criteria->compare('type_id',$this->type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BarangMerek the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
