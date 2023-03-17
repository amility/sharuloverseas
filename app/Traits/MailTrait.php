<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Models\ShippingModel;
use Mail;
use Flash;
use Response;
use Auth;
use Carbon\Carbon;

trait MailTrait
{
    public function createAccountMail($data){
        Mail::send('emails.guest_account_email', ['data' => $data], function($message) use ($data) {
            $message->to($data['email'])->subject('Welcome to Gun');
        });
    }

    public function createAccountMailToAdmin($data, $admin){
        Mail::send('emails.guest_account_email_to_admin', ['data' => $data], function($message) use ($data, $admin) {
            $allEmails = config('adminEmails.all_admins');
            $message->to($allEmails)->subject('Received guest account for Gun');
        });
    }

    public function orderMailToAdmin($data, $admin){
        Mail::send('emails.orderDetails_email_to_admin', ['order' => $data], function($message) use ($data, $admin) {
            $allEmails = config('adminEmails.all_admins');
            $message->to($allEmails)->subject('Order received from Gun');
        });
    }

    public function orderMailToCustomer($data, $customer){
        Mail::send('emails.orderDetails_email_to_customer', ['order' => $data], function($message) use ($data, $customer) {
            $message->to($customer['email'])->subject('Order has been placed successfully from Gun');
        });
    }

    public function orderStatusChangeMailToCustomer($data, $recipient){
        Mail::send('emails.status', ['order' => $data], function ($message) use ($recipient) {
            $message->to($recipient['email'])->subject('Order status changed [Gun]');

        });
    }
}
