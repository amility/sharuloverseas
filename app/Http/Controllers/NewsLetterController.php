<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;
use Mail;
use Flash;
use DB;

class NewsLetterController extends Controller
{

    public function checkSubscriber(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $emaildata = NewsLetter::where(['email' => $request[ 'email' ]])->count();

        if ($emaildata >= 1) {

            return redirect()->back()->withInput()->withErrors(['email' => 'You have already Susbcribed']);
        } else {

            date_default_timezone_set("Asia/kolkata");
            $date = date('Y-m-d H:i:s');
            $newtimestamp = strtotime($date . ' + 5 minute');//gets timestamp
            //convert into whichever format you need
            $newdate = date('Y-m-d H:i:s', $newtimestamp);
            $data = [
                'email'         => $request[ 'email' ],
                'expiry_date'   => $newdate,
                'is_active'     => '0'
            ];

            NewsLetter::create($data);

            $data[ 'email_encoded' ] = base64_encode($request[ 'email' ]);

            Mail::send('templates.default.send_link', ['data' => $data], function ($message) use ($data) {
                $message->to($data[ 'email' ])->subject('Subscription Link [G&B Custom Embroidery]');
                $message->from(env("MAIL_FROM_ADDRESS"));
            });

            Flash::success('Subsribe link sent successfully.');

            return back()->withInput();
        }

    }

    public function send_link($email)
    {

        $decodedEmail = base64_decode($email);
        $emaildata = NewsLetter::where(['email' => $decodedEmail])->first();

        date_default_timezone_set("Asia/kolkata");
        $date = date('Y-m-d H:i:s');

        //fetching current time to check with GET variable's time
        if ($emaildata[ 'expiry_date' ] > $date) {

            $updatestatus = DB::table('newsletter_subscriber')->where('email', '=', $decodedEmail)->update(array(
                'is_active' => '1'
            ));

            if ($updatestatus) {
                //return redirect()->back()->withErrors(['link_sent' => 'You have successfully subcribed']);
                echo "Thank You! You have been successfully subscribed to G&B Custom Embroidery mailing list! Click <a href='/'>Here</a> to go to G&B Custom Embroidery";
            }

        } else {
            //return redirect()->back();
            return redirect()->back()->withErrors(['link' => 'Link has been expired']);

        }

    }


}
