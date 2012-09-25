<?php

/**
 * This is the model class for table "paypal_orders".
 *
 * The followings are the available columns in table 'paypal_orders':
 * @property string $id
 * @property string $token
 * @property string $payerID
 * @property string $paymentType
 * @property string $currencyCodeType
 * @property string $ack
 * @property string $transactionId
 * @property string $transactionType
 * @property string $orderTime
 * @property string $amt
 * @property string $currencyCode
 * @property string $feeAmt
 * @property string $taxAmt
 * @property string $paymentStatus
 * @property string $pendingReason
 * @property string $reasonCode
 * @property string $ErrorCode
 * @property string $ErrorShortMsg
 * @property string $ErrorLongMsg
 * @property string $ErrorSeverityCode
 * @property string $UserEmail
 * @property string $EmailSent
 */
class PaypalOrders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaypalOrders the static model class
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
		return 'paypal_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('token', 'required'),
			array('token, payerID, paymentType, currencyCodeType, ack, transactionId, transactionType, orderTime, amt, currencyCode, feeAmt, taxAmt, paymentStatus, pendingReason, reasonCode, ErrorCode, ErrorShortMsg, ErrorSeverityCode, UserEmail, EmailSent', 'length', 'max'=>500),
			array('ErrorLongMsg', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, token, payerID, paymentType, currencyCodeType, ack, transactionId, transactionType, orderTime, amt, currencyCode, feeAmt, taxAmt, paymentStatus, pendingReason, reasonCode, ErrorCode, ErrorShortMsg, ErrorLongMsg, ErrorSeverityCode, UserEmail, EmailSent, tip1, tip2, tip3, subscription', 'safe', 'on'=>'search'),
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
			'token' => 'Token',
			'payerID' => 'Payer',
			'paymentType' => 'Payment Type',
			'currencyCodeType' => 'Currency Code Type',
			'ack' => 'Ack',
			'transactionId' => 'Transaction',
			'transactionType' => 'Transaction Type',
			'orderTime' => 'Order Time',
			'amt' => 'Amt',
			'currencyCode' => 'Currency Code',
			'feeAmt' => 'Fee Amt',
			'taxAmt' => 'Tax Amt',
			'paymentStatus' => 'Payment Status',
			'pendingReason' => 'Pending Reason',
			'reasonCode' => 'Reason Code',
			'ErrorCode' => 'Error Code',
			'ErrorShortMsg' => 'Error Short Msg',
			'ErrorLongMsg' => 'Error Long Msg',
			'ErrorSeverityCode' => 'Error Severity Code',
			'UserEmail' => 'User Email',
			'tip1' => 'tip1',
            'tip2' => 'tip2',
            'tip3' => 'tip3',
            'Subscription' => 'Subscription',
            'EmailSent' => 'Email Sent',
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
		$criteria->compare('token',$this->token,true);
		$criteria->compare('payerID',$this->payerID,true);
		$criteria->compare('paymentType',$this->paymentType,true);
		$criteria->compare('currencyCodeType',$this->currencyCodeType,true);
		$criteria->compare('ack',$this->ack,true);
		$criteria->compare('transactionId',$this->transactionId,true);
		$criteria->compare('transactionType',$this->transactionType,true);
		$criteria->compare('orderTime',$this->orderTime,true);
		$criteria->compare('amt',$this->amt,true);
		$criteria->compare('currencyCode',$this->currencyCode,true);
		$criteria->compare('feeAmt',$this->feeAmt,true);
		$criteria->compare('taxAmt',$this->taxAmt,true);
		$criteria->compare('paymentStatus',$this->paymentStatus,true);
		$criteria->compare('pendingReason',$this->pendingReason,true);
		$criteria->compare('reasonCode',$this->reasonCode,true);
		$criteria->compare('ErrorCode',$this->ErrorCode,true);
		$criteria->compare('ErrorShortMsg',$this->ErrorShortMsg,true);
		$criteria->compare('ErrorLongMsg',$this->ErrorLongMsg,true);
		$criteria->compare('ErrorSeverityCode',$this->ErrorSeverityCode,true);
		$criteria->compare('UserEmail',$this->UserEmail,true);
		$criteria->compare('EmailSent',$this->EmailSent,true);
        $criteria->compare('tip1',$this->tip1,true);
        $criteria->compare('tip2',$this->tip2,true);
        $criteria->compare('tip3',$this->tip3,true);
        $criteria->compare('subscription',$this->subscription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}