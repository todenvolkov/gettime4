<?php

/**
 * This is the model class for table "portfolio".
 *
 * The followings are the available columns in table 'portfolio':
 * @property string $id
 * @property string $title
 * @property string $href
 * @property string $fullDescription
 * @property integer $month
 * @property integer $year
 * @property string $businessType
 * @property string $siteType
 * @property string $currentState
 * @property string $shortDescription
 */
class Portfolio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Portfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, href, fullDescription, month, year, businessType, siteType, currentState, shortDescription', 'required'),
			array('month, year', 'numerical', 'integerOnly'=>true),
			array('title, href', 'length', 'max'=>500),
			//array('businessType, siteType, currentState', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, href, fullDescription, month, year, businessType, siteType, currentState, shortDescription', 'safe', 'on'=>'search'),
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
                            'businessType' => array(self::BELONGS_TO, 'BusinessTypes', 'businessType'),

                        );
	}
    public  function  scopes()
    {
       return array (
       'Year'=>array('condition' => 'parent_id = 0 and status=1', 'order'=>'sort', 'distinct'=>'distinct'),
       );
    }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'href' => 'Href',
			'fullDescription' => 'Full Description',
			'month' => 'Month',
			'year' => 'Year',
			'businessType' => 'Business Type',
			'siteType' => 'Site Type',
			'currentState' => 'Current State',
			'shortDescription' => 'Short Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('href',$this->href,true);
		$criteria->compare('fullDescription',$this->fullDescription,true);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('businessType',$this->businessType,true);
		$criteria->compare('siteType',$this->siteType,true);
		$criteria->compare('currentState',$this->currentState,true);
		$criteria->compare('shortDescription',$this->shortDescription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}