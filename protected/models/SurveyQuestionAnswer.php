<?php

/**
 * This is the model class for table "survey_question_answer".
 *
 * The followings are the available columns in table 'survey_question_answer':
 * @property integer $id_survey
 * @property integer $id_survey_store
 * @property integer $id_customer
 * @property integer $id_question
 * @property string $id_answer
 * @property string $reason
 */
class SurveyQuestionAnswer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'survey_question_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_survey_store, id_customer, id_question, id_answer', 'required'),
			array('id_survey_store, id_customer, id_question', 'numerical', 'integerOnly'=>true),
			array('reason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_survey, id_survey_store, id_customer, id_question, id_answer, reason', 'safe', 'on'=>'search'),
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
			'survey_store'=>array(self::BELONGS_TO, 'SurveyStore', 'id_survey_store'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_survey' => 'Id Survey',
			'id_survey_store' => 'Id Survey Store',
			'id_customer' => 'Id Customer',
			'id_question' => 'Id Question',
			'id_answer' => 'Id Answer',
			'reason' => 'Reason',
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

		$criteria->compare('id_survey',$this->id_survey);
		$criteria->compare('id_survey_store',$this->id_survey_store);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('id_question',$this->id_question);
		$criteria->compare('id_answer',$this->id_answer,true);
		$criteria->compare('reason',$this->reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveyQuestionAnswer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
