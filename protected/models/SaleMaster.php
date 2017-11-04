<?php

/**
 * This is the model class for table "sale_master".
 *
 * The followings are the available columns in table 'sale_master':
 * @property integer $id
 * @property string $note_number
 * @property string $date
 * @property string $grand_total
 * @property string $pay
 * @property string $other_information
 * @property integer $patient_id
 * @property integer $user_id
 */
class SaleMaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sale_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note_number, date, patient_id, user_id', 'required'),
			array('patient_id, user_id', 'numerical', 'integerOnly'=>true),
			array('note_number, grand_total, pay', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, note_number, date, grand_total, pay, other_information, patient_id, user_id', 'safe', 'on'=>'search'),
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
			'Kasir' => array(self::BELONGS_TO, 'Pengguna', 'user_id'),							
			'Patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),							
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'note_number' => 'Nomor Nota',
			'date' => 'Tanggal',
			'grand_total' => 'Jumlah Total',
			'pay' => 'Bayar',
			'other_information' => 'Keterangan Lain',
			'patient_id' => 'Pasien',
			'user_id' => 'Kasir',
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
		$criteria->compare('note_number',$this->note_number,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('grand_total',$this->grand_total,true);
		$criteria->compare('pay',$this->pay,true);
		$criteria->compare('other_information',$this->other_information,true);
		$criteria->compare('patient_id',$this->patient_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SaleMaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateKode(){
		$_i = "PJ".date("ymDd");
		$_left = $_i;
		$_first = "001";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
				array(
					"select"=>"note_number",
					"condition" => "left(note_number, " . $_len . ") = :_left",
					"params" => array(":_left" => $_left),
					"order" => "note_number DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->note_number, $_len);
			$_no++;
			$_no = substr("000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}	
}
