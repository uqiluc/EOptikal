<?php

/**
 * This is the model class for table "useraccount".
 *
 * The followings are the available columns in table 'useraccount':
 * @property integer $id
 * @property integer $part_id
 * @property string $fullname
 * @property string $birth
 * @property string $address
 * @property string $username
 * @property string $password
 * @property integer $level
 * @property string $date_created
 */
class Pengguna extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'useraccount';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('part_id, fullname, birth, address, username, password, level', 'required'),
			array('part_id, level', 'numerical', 'integerOnly'=>true),
			array('fullname, username, password', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, part_id, fullname, birth, address, username, password, level, date_created', 'safe', 'on'=>'search'),
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
			'Bagian' => array(self::BELONGS_TO, 'UserBagian', 'part_id'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'part_id' => 'Bagian',
			'fullname' => 'Nama Lengkap',
			'birth' => 'Tanggal Lahir',
			'address' => 'Alamat',
			'username' => 'Username',
			'password' => 'Password',
			'level' => 'Level',
			'date_created' => 'Date Created',
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
		$criteria->compare('part_id',$this->part_id);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('date_created',$this->date_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function level($data){
		if ($data==1)
		{
			return "Admin";
		}
		else if($data==2)
		{
			return "Karyawan";
		}
		else if($data==3)
		{
			return "Pemilik";
		}		
	}
}
