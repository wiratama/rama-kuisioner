<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id_customer
 * @property string $name
 * @property string $address
 * @property string $contact
 * @property string $nationality
 * @property string $email
 * @property string $validation_number
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, nationality, validation_number', 'length', 'max'=>300),
			array('contact, email', 'length', 'max'=>50),
			array('email', 'email'),
			// array('email', 'unique','message'=>'Email already exists!'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_customer, name, address, contact, nationality, email, validation_number', 'safe', 'on'=>'search'),
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
			'id_customer' => Yii::t('Customer','Id Customer'),
			'name' => Yii::t('Customer','Name'),
			'address' => Yii::t('Customer','Address'),
			'contact' => Yii::t('Customer','Contact'),
			'nationality' => Yii::t('Customer','Nationality'),
			'email' => Yii::t('Customer','Email'),
			'validation_number' => Yii::t('Customer','Validation Number'),
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

		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('validation_number',$this->validation_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
