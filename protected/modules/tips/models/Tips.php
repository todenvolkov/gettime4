<?php

/**
 * This is the model class for table "tips".
 *
 * The followings are the available columns in table 'tips':
 * @property string $id
 * @property string $guid
 * @property string $untillDate
 * @property string $untillTime
 * @property double $ratio
 * @property string $gamename
 * @property string $stavka
 * @property integer $victory
 * @property double $price
 */
class Tips extends CActiveRecord implements IECartPosition
{


    function getId(){
        return 'Book'.$this->id;
    }

    function getPrice(){
        return $this->price;
    }


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tips the static model class
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
		return 'tips';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' untillDate, untillTime, ratio, gamename,price,stavka', 'required'),

			array('ratio, price', 'numerical'),
			array('guid,tip_number', 'length', 'max'=>64),
			array('gamename', 'length', 'max'=>500),
            array('finalscore, championship', 'length', 'max'=>255),
            array('victory', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, guid, untillDate, untillTime, ratio, gamename, stavka, victory, price, finalscore, championship, tip_number', 'safe', 'on'=>'search'),
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
			'guid' => 'Уникальный идентификатор',
			'untillDate' => 'Дата окончания прогноза ГГГГ-ММ-ДД',
			'untillTime' => 'Время истечения прогноза  ЧЧ:ММ',
			'ratio' => 'Коэффициент',
			'gamename' => 'Название игры',
			'stavka' => 'Вид ставки',
			'victory' => 'Результат ставки (WIN, LOSE, DRAW)',
            'finalscore' => 'Счет игры',
            'championship' => 'Чемпионат',
            'tip_number'=>'Номер прогноза',
			'price' => 'Цена',
		);
	}

    public function scopes()
    {
        return array(
            'forsale' => array('condition' => 'untilldate = "' . date('Y-m-d').'"','order'=>'tip_number, untilldate desc,untilltime desc'),
            'lastArchived' => array('condition' => 'untilldate <= "' . date('Y-m-d').'" and victory<>"" and finalscore<>""','limit'=>'9','order'=>'untilldate desc,untilltime desc'),
            'allArchived' => array('condition' => 'untilldate <= "' . date('Y-m-d').'" and victory<>"" and finalscore<>""','order'=>'untilldate,tip_number')

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
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('untillDate',$this->untillDate,true);
		$criteria->compare('untillTime',$this->untillTime,true);
		$criteria->compare('ratio',$this->ratio);
		$criteria->compare('gamename',$this->gamename,true);
		$criteria->compare('stavka',$this->stavka,true);
		$criteria->compare('victory',$this->victory);
		$criteria->compare('price',$this->price);
        $criteria->compare('finalscore',$this->finalscore);
        $criteria->compare('championship',$this->championship);
        $criteria->compare('tip_number',$this->tip_number);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}