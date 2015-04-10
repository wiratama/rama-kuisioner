<?php

/**
 * This is the model class for table "answer".
 *
 * The followings are the available columns in table 'answer':
 * @property integer $id_answer
 * @property integer $id_question
 * @property string $reasonable
 * @property string $answer
 * @property integer $skor
 */
class Answer extends CActiveRecord
{
	public $counter;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_question, skor, reasonable', 'numerical', 'integerOnly'=>true),
			// array('answer', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			// array('id_answer, id_question, reasonable, answer, skor', 'safe', 'on'=>'search'),
			array('id_answer, id_question, reasonable, skor', 'safe', 'on'=>'search'),
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
			'answer_desc'=>array(self::HAS_MANY, 'AnswerDescription', 'id_answer'),		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_answer' => 'Id Answer',
			'id_question' => 'Id Question',
			'reasonable' => 'Reasonable',
			// 'answer' => 'Answer',
			'skor' => 'Skor',
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

		$criteria->compare('id_answer',$this->id_answer);
		$criteria->compare('id_question',$this->id_question);
		$criteria->compare('reasonable',$this->reasonable,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('skor',$this->skor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
