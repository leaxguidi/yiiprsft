<?php

/**
 * This is the model class for table "visitas".
 *
 * The followings are the available columns in table 'visitas':
 * @property string $visitid
 * @property string $patientid
 * @property string $zoneid
 * @property string $visitdate
 * @property string $employeeid
 * @property string $address
 * @property string $lat
 * @property string $lon
 * @property integer $visited
 *
 * The followings are the available model relations:
 * @property Usuarios $employee
 * @property Usuarios $patient
 * @property Zonas $zone
 */
class Visitas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visitas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patientid, zoneid, visitdate, employeeid,address, lat, lon', 'required'),
			array('visited', 'numerical', 'integerOnly'=>true),
			array('patientid, zoneid, employeeid', 'length', 'max'=>20),
			array('address, lat, lon', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('visitid, patientid, zoneid, visitdate, employeeid, address, lat, lon, visited', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'Usuarios', 'employeeid'),
			'patient' => array(self::BELONGS_TO, 'Usuarios', 'patientid'),
			'zone' => array(self::BELONGS_TO, 'Zonas', 'zoneid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'visitid' => 'Visitid',
			'patientid' => 'Patientid',
			'zoneid' => 'Zoneid',
			'visitdate' => 'Visitdate',
			'employeeid' => 'Employeeid',
			'address' => 'Address',
			'lat' => 'Lat',
			'lon' => 'Lon',
			'visited' => 'Visited',
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

		$criteria->compare('visitid',$this->visitid,true);
		$criteria->compare('patientid',$this->patientid,true);
		$criteria->compare('zoneid',$this->zoneid,true);
		$criteria->compare('visitdate',$this->visitdate,true);
		$criteria->compare('employeeid',$this->employeeid,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lon',$this->lon,true);
		$criteria->compare('visited',$this->visited);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchEmployeeID($id){
		return new CActiveDataProvider('Visitas',array(
				'criteria'=> array(
				'condition' => 'employeeid = :id and visitdate = CURDATE()',
				'params' => array('id' => $id)
				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
