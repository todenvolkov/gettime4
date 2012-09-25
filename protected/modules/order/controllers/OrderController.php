<?php
require_once ("paypalfunctions.php");

class OrderController extends YFrontController
{
    public $mode='real'; // empty if real mode, 'sandbox' for testing
    public $paymentAmount=50;
    public $items=array('name'=>'Default tip','amt'=>50,'qty'=>1); // array('name' => 'Betting tip #2 at 02.09.2012', 'amt' => $paymentAmount, 'qty' => 1);
    public $itemsCount=0;
    public $tip1=0, $tip2=0, $tip3=0,$subscripton='';
public $ErrorCode ,$ErrorShortMsg ,$ErrorLongMsg ,$ErrorSeverityCode;

    public function actionPaypalCheckout()
    {
        $price1=Yii::app()->getModule('order')->price_for_1_tip;
        $price2=Yii::app()->getModule('order')->price_for_2_tips;
        $price3=Yii::app()->getModule('order')->price_for_3_tips;
      //  var_dump($price1);
      ////  var_dump($price2);
      //  var_dump($price3);

        $priceSubscription=Yii::app()->getModule('order')->price_subscription;
        $ThisPayPalOrder=new PaypalOrders();

        unset($items);
        if (isset($_POST))
        {


            if (!isset($_POST['tip'])) {  $this->renderPartial('empty_arguments'); exit; }

            $itemsCount=count($_POST['tip']);
            if ($itemsCount==1) { $price=(int) $price1; $sum=$price1;}
            if ($itemsCount==2) { $price=(int) round($price2/2); $sum=$price2; }
            if ($itemsCount==3) { $price=(int) round($price3/3); $sum=$price3; }


            foreach ($_POST['tip'] as $tipNumber)
            {
                if ($tipNumber==1) {$ThisPayPalOrder->tip1=1;}
                if ($tipNumber==2) {$ThisPayPalOrder->tip2=1;}
                if ($tipNumber==3) {$ThisPayPalOrder->tip3=1;}


                    $items[]=array('name' => 'Betting tip #'.$tipNumber, 'amt' => $price, 'qty' => 1);


            }
          //  var_dump($items);
          //  var_dump($sum);
            $this->paymentAmount=(int) $sum;

        }
        else
        {
            $this->renderPartial('empty_arguments');//,array($ErrorCode,$ErrorShortMsg,$ErrorLongMsg,$ErrorSeverityCode));
            exit;
        }

        $PaymentOption = "PayPal";
        if ( $PaymentOption == "PayPal")
        {
                $paymentAmount = $this->paymentAmount;
                $finalPaymentAmount=$this->paymentAmount;
                $currencyCodeType = "EUR";
                $paymentType = "Sale";
                $returnURL = "http://bettime.info/paypal/confirmation";
                $cancelURL = "http://bettime.info/paypal/cancel";
        		//$items[] = $this->items;//
        		$resArray = SetExpressCheckoutDG( $paymentAmount, $currencyCodeType, $paymentType,
        												$returnURL, $cancelURL, $items );


                $ack = strtoupper($resArray["ACK"]);

               // var_dump($ack);

                if($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING")
                {


                        $token = urldecode($resArray["TOKEN"]);
                        $ThisPayPalOrder->token=$token;
                        if ($ThisPayPalOrder->save())
                            {
                                RedirectToPayPalDG( $token );
                            }
                        else
                            {

                               $this->renderPartial('cannot_save_order');//,array($ErrorCode,$ErrorShortMsg,$ErrorLongMsg,$ErrorSeverityCode));
                                exit;
                            }

                }
                else
                {
                        //Display a user friendly Error on the page using any of the following error information returned by PayPal
                        $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
                        $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
                        $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
                        $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
                        $ThisPayPalOrder->ErrorCode=$ErrorCode;
                        $ThisPayPalOrder->ErrorShortMsg=$ErrorShortMsg;
                        $ThisPayPalOrder->ErrorLongMsg=$ErrorLongMsg;
                        $ThisPayPalOrder->ErrorSeverityCode=$ErrorSeverityCode;
                        if ($ThisPayPalOrder->save())
                            {
                                throw new CDbException($ErrorLongMsg);exit;
                                 $this->renderPartial('paypal_payment_failed');//,array($ErrorCode,$ErrorShortMsg,$ErrorLongMsg,$ErrorSeverityCode));
                            }
                        else
                          {
                              throw new CDbException($ErrorLongMsg);exit;
                             $this->renderPartial('cannot_save_order');//,array($ErrorCode,$ErrorShortMsg,$ErrorLongMsg,$ErrorSeverityCode));
                          }
                }
        }
    }

    public function actionPaypalConfirmation()
    {

        $PaymentOption = "PayPal";
        if ( $PaymentOption == "PayPal" )
        {
        	$res = GetExpressCheckoutDetails( $_REQUEST['token'] );
        	$finalPaymentAmount =  $res["AMT"];
        	//Format the  parameters that were stored or received from GetExperessCheckout call.
        	$token 				= $_REQUEST['token'];
        	$payerID 			= $_REQUEST['PayerID'];
        	$paymentType 		= 'Sale';
        	$currencyCodeType 	= $res['CURRENCYCODE'];

            $criteria=new CDbCriteria;
            $criteria->condition='token = :token';
            $criteria->params=array(':token'=>$token);


            $ThisPayPalOrder=PaypalOrders::model()->find($criteria);
            if (empty($ThisPayPalOrder))
            {
                $this->renderPartial('paypal_cannot_find_order');
                exit;
            }


            $ThisPayPalOrder->token=$token;
            $ThisPayPalOrder->payerID=$payerID;
            $ThisPayPalOrder->paymentType=$paymentType;
            $ThisPayPalOrder->currencyCodeType=$currencyCodeType;

            $ThisPayPalOrder->ack='UNKNOWN';
            $ThisPayPalOrder->save();

        	$resArray = ConfirmPayment ( $token, $paymentType, $currencyCodeType, $payerID, $finalPaymentAmount );
        	$ack = strtoupper($resArray["ACK"]);
        	if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
        	{

        		/*        		 * TODO: Proceed with desired action after the payment            		 */

        		$transactionId		= $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // Unique transaction ID of the payment.
        		$transactionType 	= $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; // The type of transaction Possible values: l  cart l  express-checkout
        		$paymentType		= $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  // Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant
        		$orderTime 			= $resArray["PAYMENTINFO_0_ORDERTIME"];  // Time/date stamp of payment
        		$amt				= $resArray["PAYMENTINFO_0_AMT"];  // The final amount charged, including any  taxes from your Merchant Profile.
        		$currencyCode		= $resArray["PAYMENTINFO_0_CURRENCYCODE"];  // A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD.
        		$feeAmt				= $resArray["PAYMENTINFO_0_FEEAMT"];  // PayPal fee amount charged for the transaction
        	//	$settleAmt			= $resArray["PAYMENTINFO_0_SETTLEAMT"];  // Amount deposited in your PayPal account after a currency conversion.
        		$taxAmt				= $resArray["PAYMENTINFO_0_TAXAMT"];  // Tax charged on the transaction.
        	//	$exchangeRate		= $resArray["PAYMENTINFO_0_EXCHANGERATE"];  // Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer's account.
          //     var_dump($criteria);
                $ThisPayPalOrder=PaypalOrders::model()->find($criteria);
                //var_dump($ThisPayPalOrder);

                $ThisPayPalOrder->ack=$ack;
                $ThisPayPalOrder->transactionId=$transactionId;
                $ThisPayPalOrder->transactionType=$transactionType;
                $ThisPayPalOrder->paymentType=$paymentType;
                $ThisPayPalOrder->orderTime=$orderTime;
                $ThisPayPalOrder->amt=$amt;
                $ThisPayPalOrder->currencyCode=$currencyCode;
                $ThisPayPalOrder->feeAmt=$feeAmt;
                $ThisPayPalOrder->taxAmt=$taxAmt;

        		/*
        		 ' Status of the payment:
        		 'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
        		 'Pending: The payment is pending. See the PendingReason element for more information.
        		 */

        		$paymentStatus = $resArray["PAYMENTINFO_0_PAYMENTSTATUS"];
                $ThisPayPalOrder->paymentStatus=$paymentStatus;

        		/*
        		 'The reason the payment is pending:
        		 '  none: No pending reason
        		 '  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile.
        		 '  echeck: The payment is pending because it was made by an eCheck that has not yet cleared.
        		 '  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview.
        		 '  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment.
        		 '  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment.
        		 '  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service.
        		 */

        		$pendingReason = $resArray["PAYMENTINFO_0_PENDINGREASON"];
                $ThisPayPalOrder->pendingReason=$pendingReason;
        		/*
        		 'The reason for a reversal if TransactionType is reversal:
        		 '  none: No reason code
        		 '  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer.
        		 '  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee.
        		 '  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer.
        		 '  refund: A reversal has occurred on this transaction because you have given the customer a refund.
        		 '  other: A reversal has occurred on this transaction due to a reason not listed above.
        		 */

        		$reasonCode	= $resArray["PAYMENTINFO_0_REASONCODE"];
                $ThisPayPalOrder->reasonCode=$reasonCode;

                $ThisPayPalOrder->UserEmail=Yii::app()->user->getState('email');

        		// Add javascript to close Digital Goods frame. You may want to add more javascript code to
        		// display some info message indicating status of purchase in the parent window

                if ($ThisPayPalOrder->save())
                {
                    if ($paymentStatus=='Completed')
                                    {
                                        $criteria=new CDbCriteria;
                                        if ($ThisPayPalOrder->tip1==1)
                                        { $cond='tip_number=1';}

                                        if ($ThisPayPalOrder->tip2==1)
                                        { if (strlen($cond)>1)
                                            $cond=$cond.' or tip_number=2';
                                          else $cond='tip_number=2';
                                        }

                                        if ($ThisPayPalOrder->tip3==1)
                                        {
                                            if( strlen($cond)>1)
                                                $cond=$cond.' or tip_number=3';
                                            else
                                                $cond='tip_number=3';
                                        }

                                        If (($ThisPayPalOrder->tip1==1) and ($ThisPayPalOrder->tip2==1) and ($ThisPayPalOrder->tip3==1))
                                            $cond='1=1'; // all tips if bought 3 tips


                                        $criteria->condition=$cond;
                                        $tips=Tips::model()->forsale()->findAll($criteria);
                                        $tipsText='<h1>Hello, yor betting tips from Bettime.info</h1>';
                                        $tipsText=$tipsText.'<table border="1" cellpadding="2" cellspacing="2">';
                                        $tipsText=$tipsText.'<thead><td>Date</td><td>Number</td><td>Time</td><td>Championship</td><td>Game</td><td>Bet</td><td>Odd</td></thead>';

                                        foreach ($tips as $tip)
                                        {
                                            $tipsText=$tipsText.'<td>'.strval($tip->untillDate).'</td><td>'.strval($tip->tip_number).'</td><td>'.strval($tip->untillTime).'</td><td>'.strval($tip->championship).' </td><td>'.strval($tip->gamename).' </td><td>'.strval($tip->stavka).' </td><td>'.strval($tip->ratio).'</td></tr>';
                                        }
                                        $tipsText=$tipsText.'</table>';
                                        $tipsText=$tipsText.'<br><br><p>Sincerely yours, <a href="http://bettime.info">Bettime.info</a> team.</p>';


                                        //$tipsText=$this->renderPartial('paypal_show_bought_tips',array('tips'=>$tips));
                                        $headers = array(
                                        		'MIME-Version: 1.0',
                                        		'Content-type: text/html; charset=iso-8859-1'
                                        	);

                                        $this->renderPartial('paypal_show_bought_tips',array('tips'=>$tips));
                                        Yii::app()->email->send('info@bettime.info',Yii::app()->user->getState('email'),'Your beting tips from Bettime.info',$tipsText,$headers);
                                        Yii::app()->email->send('info@bettime.info','info@bettime.info','New order, '.$ThisPayPalOrder->amt.' euro',$tipsText,$headers);
                                        $ThisPayPalOrder->EmailSent='TRUE';
                                        $ThisPayPalOrder->save();

                                    }
                    else
                    {
                        $this->renderPartial('paypal_pending'); exit;

                    }


                }
                else
                {
                    $this->renderPartial('cannot_save_order'); exit;
                }







        	}
        	else
        	{
        		//Display a user friendly Error on the page using any of the following error information returned by PayPal
        		$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
        		$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
        		$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
        		$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
                $ThisPayPalOrder->ErrorCode=$ErrorCode;
                $ThisPayPalOrder->ErrorShortMsg=$ErrorShortMsg;
                $ThisPayPalOrder->ErrorLongMsg=$ErrorLongMsg;
                $ThisPayPalOrder->ErrorSeverityCode=$ErrorSeverityCode;
                $ThisPayPalOrder->update();
                $this->renderPartial('paypal_payment_failed');//,array($ErrorCode,$ErrorShortMsg,$ErrorLongMsg,$ErrorSeverityCode));

        	?>

        <?php
        	}
        }
    }




	public function actionIndex()
	{
		$this->render('index');
	}

    public function  actionCheck()
    {
        return true;

    }
    public  function actionSave()
    {
        return true;
    }
    public function actionProcessPaypal()
    {

       // read the post from PayPal system and add 'cmd'
        $req = 'cmd=' . urlencode('_notify-validate');

        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }

        if ($this->mode=='sandbox')
        {
            $paypalURL='https://www.sandbox.paypal.com/cgi-bin/webscr';
            $paypalHTTP='Host: www.sandbox.paypal.com';
        }
        else
        {
            $paypalURL='https://www.paypal.com/cgi-bin/webscr';
            $paypalHTTP='Host: www.paypal.com';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($paypalHTTP));
        $res = curl_exec($ch);
        curl_close($ch);

        Yii::log('Transaction begins','info','paypal');


        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $payment_status = $_POST['payment_status'];
        $payment_date=$_POST['payment_date'];
        $payment_userid=$_POST['payer_id'];
        $payment_amount = $_POST['mc_gross'];
        $payment_currency = $_POST['mc_currency'];
        $txn_id = $_POST['txn_id'];
        $receiver_email = $_POST['receiver_email'];
        $payer_email = $_POST['payer_email'];



//


        if (strcmp ($res, "VERIFIED") == 0) {
            Yii::log('Transaction Verified','info','paypal','transaction');
            if (($payment_status=='Completed') and ($receiver_email=='info@bettime.info'))
            {
                Yii::log('Transaction Payment is Complete','info','paypal');
                $order=Order::model()->findAll('txn_id=:txn_id',array('txn_id'=>$txn_id));
                if (count($order)>0)
                {
                    Yii::log('Order already Exists','info','paypal');
                    if ($order->payment_status !='Completed')
                    {
                        Yii::log('Trying to update order status','info','paypal');
                        if (($order->delivery_adress==$payer_email) and  ($order->ordersum==$payment_amount))
                            {
                                $order->payment_status='Completed';
                                if ($order->save())
                                {
                                    Yii::log('Order update succesfull','info','paypal');
                                }
                                else
                                {
                                    Yii::log('Cannot update order, DB error','error');
                                    header('HTTP/1.0 401 Cannot modify order', true, 40);
                                }
                            } // if email and summ matches
                        else
                        {
                            Yii::log('Payer adress and summ dont match with existing','info','paypal');
                        }
                    } // if order status != completed
                    else
                    {
                        Yii::log('Transaction status is incomplete - skipping','info','paypal');
                    }

                } // if count(order)>0
                else
                {
                    // if no Previous txns
                    Yii::log('Creating new order','info','paypal');
                    $myorder=new Order();

                    $myorder->payment_status=$payment_status;
                    $myorder->delivery_adress=$payer_email;
                    //13:54:56 Aug 12, 2012 PDT
                   // $myorder->orderdate=date('Y-m-D');
//                    if (($payment_amount<50) and ($currency!='EUR'))
//                    {
//                        Yii::log('Sum is less 50 or currency dont match','info','paypal');
//                        exit;
//                    }
                    $myorder->ordersum=$payment_amount;
                    $myorder->userid=$payment_userid;
                    $myorder->txn_id=$txn_id;
                    $myorder->tip=json_encode($_POST);

                    $tipNumber=substr($item_number,0,3);

                    if ($tipNumber=='TIP')
                    {
                        $tipNumber2=substr($item_number,3,1);
                        $tip=Tips::model()->forsale()->find('tip_number=:tip_number',array('tip_number'=>$tipNumber2));
                        $tipText='Date: '.strval($tip->untillDate).' | time: '.strval($tip->untillTime).' | championship: '.strval($tip->championship).' | teams: '.strval($tip->gamename).' | bet: '.strval($tip->stavka).' | odd: '.strval($tip->ratio);

                        if (count($tip)>0)
                        {
                           $tipText='Date: '.strval($tip->untillDate).' | time: '.strval($tip->untillTime).' | championship: '.strval($tip->championship).' | teams: '.strval($tip->gamename).' | bet: '.strval($tip->stavka).' | odd: '.strval($tip->ratio);
                        }
                    }
                    if ($myorder->save())
                    {
                        $headers = array('MIME-Version: 1.0','Content-type: text/html; charset=iso-8859-1');
                        Yii::log('Order succesfully saved, trying to send email','info','paypal');
                        //Yii::app()->email->send('info@bettime.info',$payer_email,'Your beting tips from Bettime.info',$tipText);
                        Yii::app()->email->send('info@bettime.info','info@bettime.info','New order!',json_encode($_POST));
                        $myorder->delivery_status='delivered';
                        if ($myorder->save())
                            Yii::log('Order succesfully saved, email sent','info','paypal');
                        else
                            Yii::log('Failed updating delivery status','info','paypal');
                    }
                    else
                    {
                        Yii::log('Problem with saving new order','error');
                                             header('HTTP/1.0 401 Cannot save order', true, 40);
                    }
                }
            }  // if completed and email match
            else
            {
                Yii::log('Transaction is incomplete or receiver email dont match. Skippingd','info','paypal');
            }
        } // if VERIFIED
        else if (strcmp ($res, "INVALID") == 0) {
            Yii::log('Transaction is INVALID','info','paypal');
            header('HTTP/1.0 401 Bad Request', true, 40);
        }
        else
        {
            Yii::log('Incorrect answer from IPN server','info','paypal');
               header('HTTP/1.0 402 Bad Request', true, 40);
        }




    } //function

    public function actionProcessOkpay()
    {

        $email = "info@betttime.info"; // <------ change to your email address!!!
        $header = ""; 
        $emailtext = "THIS IS TIP PAYED BY OKPAY"; 
         
        // Read the post from OKPAY and add 'ok_verify' 
        $req = 'ok_verify=true'; 
        
        foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
        }
        Yii::log('Transaction begins','info','okpay');
        
        
        // Post back to OKPAY to validate 
        $header .= "POST /ipn-verify.html HTTP/1.0\r\n"; 
        $header .= "Host: www.okpay.com\r\n"; 
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n"; 
        $fp = fsockopen ('www.okpay.com', 80, $errno, $errstr, 30); 
         
        // Process validation from OKPAY
        if (!$fp) 
        {
            Yii::log('HTTP Error readind from host','info','okpay');
        } else
        {
            Yii::log('NO HTTP Error!','info','okpay');
          fputs ($fp, $header . $req); 
          while (!feof($fp))
          { 
            $res = fgets ($fp, 1024); 
            if (strcmp ($res, "VERIFIED") == 0) // !!!!!!
            { 
              // TODO: 
              // Check the "ok_txn_status" is "completed"
                $payment_status = $_POST['ok_txn_status'];
                $txn_id = $_POST['ok_txn_id'];
                $receiver_email = $_POST['ok_receiver_email'];
                $payment_amount = $_POST['ok_txn_gross'];
                $payer_email = $_POST['ok_payer_email'];
                $payment_userid=$_POST['ok_payer_id'];
                $item_number=$_POST['ok_item_1_name'];
                $currency=$_POST['ok_txn_currency'];
                $transactionDate=$_POST['ok_txn_datetime'];

                if (($payment_status=='completed') and ($receiver_email=='info@bettime.info') and ($payment_amount=='50') and ($currency=='EUR'))
              {
                  Yii::log('Transaction Payment is Complete','info','okpay');
                  $order=Order::model()->findAll('txn_id=:txn_id',array('txn_id'=>$txn_id));
                  if (count($order)>0)
                  {
                      Yii::log('Order already Exists','info','okpay');
                      if (ucwords($order->payment_status)!='COMPLETED')
                      {
                          Yii::log('Trying to update order status','info','okpay');
                          if (($order->delivery_adress==$payer_email) and  ($order->ordersum==$payment_amount))
                              {
                                  $order->payment_status='Completed';
                                  if ($order->save())
                                  {
                                      Yii::log('Order update succesfull','info','okpay');
                                  }
                                  else
                                  {
                                      Yii::log('Cannot update order, DB error','error');
                                      header('HTTP/1.0 401 Cannot modify order', true, 40);
                                  }
                              } // if email and summ matches
                          else
                          {
                              Yii::log('Payer adress and summ dont match with existing','info','okpay');
                          }
                      } // if order status != completed
                      else
                      {
                          Yii::log('Transaction status is incomplete - skipping','info','okpay');
                      }

                  } // if count(order)>0
                  else
                  {
                      // if no Previous txns
                      Yii::log('Creating new order','info','okpay');
                      $myorder=new Order();

                      $myorder->payment_status=$payment_status;
                      $myorder->delivery_adress=$payer_email;
                      //13:54:56 Aug 12, 2012 PDR
                     // $myorder->orderdate=date('Y-m-D');

                      $myorder->ordersum=$payment_amount;
                      $myorder->userid=$payment_userid;
                      $myorder->txn_id=$txn_id;
                      $myorder->tip=json_encode($_POST);
                      $myorder->orderdate=$transactionDate;

                      $tipNumber=substr($item_number,0,3);
                     if (($payment_amount>=50) and ($currency=='EUR'))
                     {
                          if ($tipNumber=='TIP')
                          {
                              $tipNumber2=substr($item_number,3,1);
                              $tip=Tips::model()->forsale()->find('tip_number=:tip_number',array('tip_number'=>$tipNumber2));
                              $tipText='Date: '.strval($tip->untillDate).' | time: '.strval($tip->untillTime).' | championship: '.strval($tip->championship).' | teams: '.strval($tip->gamename).' | bet: '.strval($tip->stavka).' | odd: '.strval($tip->ratio);

                              if (count($tip)>0)
                              {
                                 $tipText='Date: '.strval($tip->untillDate).' | time: '.strval($tip->untillTime).' | championship: '.strval($tip->championship).' | teams: '.strval($tip->gamename).' | bet: '.strval($tip->stavka).' | odd: '.strval($tip->ratio);
                              }
                          }
                          if ($myorder->save())
                          {
                              $headers = array('MIME-Version: 1.0','Content-type: text/html; charset=iso-8859-1');
                              Yii::log('Order succesfully saved, trying to send email','info','paypal');
                              Yii::app()->email->send('info@bettime.info',$payer_email,'Your beting tips from Bettime.info',$tipText);
                              Yii::app()->email->send('info@bettime.info','info@bettime.info','New order!',json_encode($_POST));
                              $myorder->delivery_status='delivered';
                              if ($myorder->save())
                                  Yii::log('Order succesfully saved, email sent','info','okpay');
                              else
                                  Yii::log('Failed updating delivery status','info','okpay');
                          }
                          else
                          {
                              Yii::log('Problem with saving new order','error');
                              header('HTTP/1.0 401 Cannot save order', true, 40);
                          }
                     }
                    else
                      {
                          Yii::log('Sum is less 50 or currency not euro','info','okpay');
                          Yii::app()->email->send('info@bettime.info','info@bettime.info','Strange transaction!',json_encode($_POST));
                      }
                  }
              }  // if completed and email match
              else
              {
                  Yii::log('Transaction is incomplete or receiver email dont match. Skipping','info','okpay');
              }

            }
            else if (strcmp ($res, "INVALID") == 0)
            { 
                Yii::log('Transaction is INVALID','info','okpay');
                header('HTTP/1.0 401 Bad Request', true, 40);
            } 
            else if (strcmp ($res, "TEST")== 0)
            {
                Yii::log('Transaction is TEST','info','okpay');
            }
          } 
          fclose ($fp); 
        }





 }
}
;?>
