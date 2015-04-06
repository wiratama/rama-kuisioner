<?php

/**
 * This is the model class for table "survey_store".
 *
 * The followings are the available columns in table 'survey_store':
 * @property integer $id_survey_store
 * @property string $store_number
 * @property string $date_survey
 * @property string $struk_number
 */
class SurveyStore extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'survey_store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_number, date_survey, struk_number', 'required'),
			array('store_number, struk_number', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_survey_store, store_number, date_survey, struk_number', 'safe', 'on'=>'search'),
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
			'id_survey_store' => Yii::t('SurveyStore','Id Survey Store'),
			'store_number' => Yii::t('SurveyStore','Store Number'),
			'date_survey' => Yii::t('SurveyStore','Date Survey'),
			'struk_number' => Yii::t('SurveyStore','Struk Number'),
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

		$criteria->compare('id_survey_store',$this->id_survey_store);
		$criteria->compare('store_number',$this->store_number,true);
		$criteria->compare('date_survey',$this->date_survey,true);
		$criteria->compare('struk_number',$this->struk_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveyStore the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
