<?php

/**
 * This is the model class for table "zonasxusuarios".
 *
 * The followings are the available columns in table 'zonasxusuarios':
 * @property string $id
 * @property string $force_from
 * @property string $force_to
 * @property string $zoneid
 * @property string $userid
 * @property integer $monday
 * @property integer $tuesday
 * @property integer $wednesday
 * @property integer $thursday
 * @property integer $friday
 * @property integer $saturday
 * @property integer $sunday
 * @property string $time
 * @property string $worktime
 */
class Zonasxusuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zonasxusuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('force_from, force_to, zoneid, userid, monday, tuesday, wednesday, thursday, friday, saturday, sunday, time, worktime', 'required'),
			array('monday, tuesday, wednesday, thursday, friday, saturday, sunday', 'numerical', 'integerOnly'=>true),
			array('zoneid, userid', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, force_from, force_to, zoneid, userid, monday, tuesday, wednesday, thursday, friday, saturday, sunday, time, worktime', 'safe', 'on'=>'search'),
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
			'force_from' => 'Force From',
			'force_to' => 'Force To',
			'zoneid' => 'Zoneid',
			'userid' => 'Userid',
			'monday' => 'Monday',
			'tuesday' => 'Tuesday',
			'wednesday' => 'Wednesday',
			'thursday' => 'Thursday',
			'friday' => 'Friday',
			'saturday' => 'Saturday',
			'sunday' => 'Sunday',
			'time' => 'Time',
			'worktime' => 'Worktime',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('force_from',$this->force_from,true);
		$criteria->compare('force_to',$this->force_to,true);
		$criteria->compare('zoneid',$this->zoneid,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('monday',$this->monday);
		$criteria->compare('tuesday',$this->tuesday);
		$criteria->compare('wednesday',$this->wednesday);
		$criteria->compare('thursday',$this->thursday);
		$criteria->compare('friday',$this->friday);
		$criteria->compare('saturday',$this->saturday);
		$criteria->compare('sunday',$this->sunday);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('worktime',$this->worktime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Zonasxusuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
