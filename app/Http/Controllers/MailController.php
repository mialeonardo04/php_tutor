<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Illuminate\Support\Facades\URL;
use Swift_Transport;
use Swift_Message;
use App\User;
use Swift_Mailer;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }
//
//    public function getForgotPass(){
//        return view('emails.forgot');
//    }
    /**
     * Update posisi menu
     *
     * @param  int  $id
     * @return Response
     */
    public function sendemail(Request $request)
    {

        $data_toview = array();
        $user_id = 0;
        $username ="";

        $email_sender   = 'phptutori@gmail.com';
        $email_pass     = 'AdminPhpITutor';
        $email_to       = $request['email'];
        $user = User::where('email','=',$email_to)->first();
        if (!empty($user)){
            $user_id = $user->id;
            $username = $user->username;

            $data_toview['username'] = $username;
            $data_toview['email'] = $email_to;
            $data_toview['bodymessage'] = URL::to('/reset/'.base64_encode($email_to).'/'.base64_encode($user_id));
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();

            if (User::where('email','=',$email_to)->count() >0){
                try{

                    //https://accounts.google.com/DisplayUnlockCaptcha
                    // Setup your gmail mailer
                    $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
                    $transport->setUsername($email_sender);
                    $transport->setPassword($email_pass);

                    // Any other mailer configuration stuff needed
                    $gmail = new Swift_Mailer($transport);

                    // Set the mailer as gmail
                    \Mail::setSwiftMailer($gmail);

                    $data['emailto'] = $email_to;
                    $data['sender'] = $email_sender;

                    Mail::send('emails.html', $data_toview, function($message) use ($data)
                    {

                        $message->from($data['sender'], 'no-reply@admin.phpitutor.io');
                        $message->to($data['emailto'])
                            ->replyTo($data['sender'], 'no-reply@admin.phpitutor.io')
                            ->subject('Reset Password Notification');

                    });

                }catch(\Exception $e){
                    $response = $e->getMessage() ;
                    echo $response;
                }

                Mail::setSwiftMailer($backup);

                return redirect()->back()->with('messageSendMailSuccess','Check email at '.$email_to.' to reset your password');
            } else {
                return redirect()->back()->with('messageSendMailFailed',$email_to.' does not exist. Please use a verified email');
            }
        } else {
            return redirect()->back()->with('messageSendMailFailed',$email_to.' does not exist in our database. Please sign up first');
        }


    }

    public function resetPassword(Request $request){
        $this->validate($request,[
            'password' => 'required|min:6'
        ]);


        $email = $request['email'];
        $id = $request['id'];
        $password = bcrypt($request['password']);

        $credential = array(
            'id' => $id,
            'email' => $email
        );

        try{
            User::where($credential)
                ->limit(1)
                ->update(['password'=>$password]);

            return redirect()->route('login')->with('messageResetSuccess',"Reset Password Successful");
        }catch (\Exception $e){
            return redirect()->route('login')->with('messageResetFailed',"Reset Password Unsuccessful");
        }


    }
}
