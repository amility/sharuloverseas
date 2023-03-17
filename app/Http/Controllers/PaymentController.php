<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use App\Models\PaymentLogs;

use Cart;
use App\Http\Controllers\AddToCartController as AddToCartController;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;


class PaymentController extends AddToCartController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth'); // later enable it when needed user login while payment
    }

    // start page form after start
    public function pay() {
        return view('templates.default.pay');
    }

    public function handleonlinepay(Request $request) {
        try{
            $amt = $request->passamountword;
            if($amt == $request->amount):
                if($request->checkout_payment_method == 'online')
                {
                    $request->validate([
                        'owner' =>'required',
                        'cvv' =>' required',
                        'cardNumber' => 'required',
                        'amount'=>'required',
                        'expiration-month' => 'required',
                        'expiration-year' => 'required'
                    ]);
                }
            // Family
            if(Auth::guard('customer')->user()){

                $request->validate([
                    'checkbox' =>'accepted',
                    'shippingAddress_id' => 'required',
                    'checkout_payment_method' => 'required',
                ]);
                
            Session::put('reqDetails', $request->all());
            // Payment Status
             $input = $request->input();
            /* Create a merchantAuthenticationType object with authentication details
              retrieved from the constants file */
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
            $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
    
            // Set the transaction's refId
            $refId = 'ref' . time();
            $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);
            
            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($cardNumber);
            $creditCard->setExpirationDate($input['expiration-year'] . "-" .$input['expiration-month']);
            $creditCard->setCardCode($input['cvv']);
    
            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);
    
            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($input['amount']);
            $transactionRequestType->setPayment($paymentOne);
    
            // Assemble the complete transaction request
            $requests = new AnetAPI\CreateTransactionRequest();
            $requests->setMerchantAuthentication($merchantAuthentication);
            $requests->setRefId($refId);
            $requests->setTransactionRequest($transactionRequestType);
    
            // Create the controller and get the response
            $controller = new AnetController\CreateTransactionController($requests);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
            if ($response != null) {
                // Check to see if the API request was successfully received and acted upon
                if ($response->getMessages()->getResultCode() == "Ok") {
                    // Since the API request was successful, look for a transaction response
                    // and parse it to display the results of authorizing the card
                    $tresponse = $response->getTransactionResponse();
    
                    if ($tresponse != null && $tresponse->getMessages() != null) {
    //                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
    //                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
    //                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
    //                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
    //                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                        $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                        $msg_type = "success_msg";    
                        
                        \App\Models\PaymentLogs::create([                                         
                            'amount' => $input['amount'],
                            'response_code' => $tresponse->getResponseCode(),
                            'transaction_id' => $tresponse->getTransId(),
                            'auth_id' => $tresponse->getAuthCode(),
                            'message_code' => $tresponse->getMessages()[0]->getCode(),
                            'name_on_card' => trim($input['owner']),
                            'quantity'=>1
                        ]);
                    } else {
                        $message_text = 'There were some issue with the payment. Please try again later.';
                        $msg_type = "error_msg";                                    
    
                        if ($tresponse->getErrors() != null) {
                            $message_text = $tresponse->getErrors()[0]->getErrorText();
                            $msg_type = "error_msg";                                    
                        }
                    }
                    // Or, print errors if the API request wasn't successful
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";                                    
    
                    $tresponse = $response->getTransactionResponse();
    
                    if ($tresponse != null && $tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";                    
                    } else {
                        $message_text = $response->getMessages()->getMessage()[0]->getText();
                        $msg_type = "error_msg";
                    }                
                }
            } else {
                $message_text = "No response returned";
                $msg_type = "error_msg";
            }
            if($msg_type == 'success_msg')
            {
                $re = Session::get('reqDetails');
                return   $this->customerPayment($re);
            }
            else
            {
                return back()->with($msg_type, $message_text);
    
            }
               
            } // end Family
            else // Guest
            {
                if(empty(Cart::session(Session::get('usercartId'))->getContent()->toArray())){
                    return view('templates.default.screen.cart_empty');
                }
                Session::put('reqDetails', $request->all());
    
                $request->validate([
                    'billing_address.first_name' => 'required',
                    'billing_address.last_name' => 'required',
                    //'billing_address.email_address' => 'required|email|unique:customers,email',
                    'billing_address.email_address' => 'required|email',
                    'billing_address.town_city' => 'required|max:125',
                    // 'billing_address.state_country' => 'required|max:125',
                    'billing_address.country' => 'required|max:125',
                    // 'billing_address.postcode_zip' => 'required|integer|regex:/\b\d{6}\b/',
                    'billing_address.phone' => 'required',
                    'billing_address.street_address' => 'required|max:500',
                    'billing_address.block' => 'required|max:500',
                    'billing_address.house_building' => 'required|max:500',
                    'checkbox' =>'accepted',
                    'checkout_payment_method' => 'required',
                ]);
        
                if(isset($input['shipping_address_check'])){
                    $request->validate([
                    'shipping_address.first_name' => 'required',
                    'shipping_address.last_name' => 'required',
                    'shipping_address.email_address' => 'required|email',
                    'shipping_address.town_city' => 'required|max:125',
                    // 'shipping_address.state_country' => 'required|max:125',
                    'shipping_address.country' => 'required|max:125',
                    // 'shipping_address.postcode_zip' => 'required|integer|regex:/\b\d{6}\b/',
                    'shipping_address.phone' => 'required',
                    'shipping_address.street_address' => 'required|max:500',
                    'shipping_address.block' => 'required|max:500',
                    'shipping_address.house_building' => 'required|max:500',
                ]);
                }
                // Payment Status
    
                $input = $request->input();
            
            /* Create a merchantAuthenticationType object with authentication details
              retrieved from the constants file */
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
            $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
    
            // Set the transaction's refId
            $refId = 'ref' . time();
            $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);
            
            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($cardNumber);
            $creditCard->setExpirationDate($input['expiration-year'] . "-" .$input['expiration-month']);
            $creditCard->setCardCode($input['cvv']);
    
            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);
    
            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($input['amount']);
            $transactionRequestType->setPayment($paymentOne);
    
            // Assemble the complete transaction request
            $requests = new AnetAPI\CreateTransactionRequest();
            $requests->setMerchantAuthentication($merchantAuthentication);
            $requests->setRefId($refId);
            $requests->setTransactionRequest($transactionRequestType);
    
            // Create the controller and get the response
            $controller = new AnetController\CreateTransactionController($requests);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
            if ($response != null) {
                // Check to see if the API request was successfully received and acted upon
                if ($response->getMessages()->getResultCode() == "Ok") {
                    // Since the API request was successful, look for a transaction response
                    // and parse it to display the results of authorizing the card
                    $tresponse = $response->getTransactionResponse();
    
                    if ($tresponse != null && $tresponse->getMessages() != null) {
    //                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
    //                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
    //                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
    //                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
    //                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                        $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                        $msg_type = "success_msg";    
                        
                        \App\Models\PaymentLogs::create([                                         
                            'amount' => $input['amount'],
                            'response_code' => $tresponse->getResponseCode(),
                            'transaction_id' => $tresponse->getTransId(),
                            'auth_id' => $tresponse->getAuthCode(),
                            'message_code' => $tresponse->getMessages()[0]->getCode(),
                            'name_on_card' => trim($input['owner']),
                            'quantity'=>1
                        ]);
                    } else {
                        $message_text = 'There were some issue with the payment. Please try again later.';
                        $msg_type = "error_msg";                                    
    
                        if ($tresponse->getErrors() != null) {
                            $message_text = $tresponse->getErrors()[0]->getErrorText();
                            $msg_type = "error_msg";                                    
                        }
                    }
                    // Or, print errors if the API request wasn't successful
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";                                    
    
                    $tresponse = $response->getTransactionResponse();
    
                    if ($tresponse != null && $tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";                    
                    } else {
                        $message_text = $response->getMessages()->getMessage()[0]->getText();
                        $msg_type = "error_msg";
                    }                
                }
            } else {
                $message_text = "No response returned";
                $msg_type = "error_msg";
            }
            if($msg_type == 'success_msg')
            {
                $re = Session::get('reqDetails');
                return   $this->guestPayment($re);
            }
            else
            {
                return back()->with($msg_type, $message_text);
    
            }
               
            }
            // End Guest
        else:
            return back();
        endif; 
        }catch(Throwable $e) {
            DB::rollBack();
            dd($e);
        }

        
    }

}
