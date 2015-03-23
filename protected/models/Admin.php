<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property integer $level
 */
class Admin extends CActiveRecord
{
	public $repeat_password;
	public $oldPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, firstname, lastname, level', 'required'),
			array('level', 'numerical', 'integerOnly'=>true),
			array('email, password, firstname, lastname', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, password, firstname, lastname, level', 'safe', 'on'=>'search'),
			array('password,repeat_password', 'required','on'=>'register'),
			array('email', 'email','message'=>"The email isn't correct"),
        	array('email', 'unique','message'=>'Email already exists!'), 
			array('password', 'compare', 'compareAttribute'=>'repeat_password'),
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
			'email' => 'Email',
			'password' => 'Password',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'level' => 'Level',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
        if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				if(!empty($this->password) && !empty($this->repeat_password))
				{
					$this->password=SHA1($this->password);
				}
			}
			else
			{	
				if(!empty($this->password) && !empty($this->repeat_password))
				{
					$this->password=SHA1($this->password);
				}
				else
				{
					$this->password = $this->oldPassword;
				}
			}
			return true;
		}
		else
			return false;
    }

    public function afterFind()
	{	
		$this->oldPassword = $this->password;
		$this->password = null;
		$this->repeat_password = null; 
		parent::afterFind();
    }

	public function validatePassword($password)
	{
		return SHA1($password);
	}
}
