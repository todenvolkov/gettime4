<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property string $id
 * @property string $userid
 * @property string $orderdate
 * @property double $ordersum
 * @property string $status
 * @property string $payment_status
 * @property string $delivery_status
 * @property string $delivery_adress
 */
class Order extends CActiveRecord
{
    public $orderitems=array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'orders';
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('userid, orderdate, ordersum, status, payment_status, delivery_status, delivery_adress', 'required'),
			array('ordersum', 'numerical'),
			array('userid', 'length', 'max'=>20),
			array('status, payment_status, delivery_status, delivery_adress', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userid, orderdate, ordersum, status, payment_status, delivery_status, delivery_adress', 'safe', 'on'=>'search'),
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
       //     'orderitems'=>array(self::HAS_MANY, 'OrderDetails', 'orderid'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userid' => 'Userid',
			'orderdate' => 'Orderdate',
			'ordersum' => 'Ordersum',
			'status' => 'Status',
			'payment_status' => 'Payment Status',
			'delivery_status' => 'Delivery Status',
			'delivery_adress' => 'Delivery Adress',
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
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('orderdate',$this->orderdate,true);
		$criteria->compare('ordersum',$this->ordersum);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('delivery_status',$this->delivery_status,true);
		$criteria->compare('delivery_adress',$this->delivery_adress,true);
        $criteria->compare('txn_id',$this->txn_id,true);
        $criteria->compare('tip',$this->tip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}