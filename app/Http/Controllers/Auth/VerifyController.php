<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class VerifyController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function index(Request $request) {
        $token = $request->token;
        if(!empty($token)) {
            $user = User::where('verify_token', $token)->first();
            if($user) {
                $user->verified = 1;
                $user->verify_token = '';
                $user->save();
                return redirect()->route('login')->with('verified_successfully', \Lang::get('auth.verified_successfully'));
            } else {
                return redirect()->route('verify')->with('token_invalid', \Lang::get('auth.token_invalid'));
            }
        }

        return view('pages.auth.verify.verify');
    }

    public function resendMail() {
        return view('pages.auth.verify.resend');
    }

    public function processingResendMail(Request $request) {
        $email = $request->email;
        if($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where(['email' => $email, 'verified' => 0])->first();
            if($user) {
                if($user->updated_at > date('Y-m-d H:i:s', time() - 5 * 30)) { //waiting -> cannot send
                    return redirect()->route('verify.resend')->with('resend_waiting', \Lang::get('auth.resend_waiting'));
                } else {
                    $user->verify_token = $this->createVerifyToken($user->verify_token);
                    $user->save();
                    $this->sendMailActivation($user);
                    return redirect()->route('verify.resend')->with('resent', \Lang::get('auth.resent_mail_successful'));
                }
            }
        }
        return redirect()->route('verify.resend')->with('email_invalid', \Lang::get('auth.email_invalid'));
    }

    public function changeEmail() {
        return view('pages.auth.verify.change_email');
    }

    public function processingChangeEmail(Request $request) {
        $email = $request->email;
        $user_name = $request->user_name;
        $new_email = $request->new_email;
        if($user_name && $email && $new_email && $email != $new_email && filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where(['user_name' => $user_name,'email' => $email, 'verified' => 0])->first();
            if($user) {
                if($user->updated_at > date('Y-m-d H:i:s', time() - 5 * 30)) { //waiting -> cannot change email
                    return redirect()->route('verify.change_email')->with('change_email_waiting', \Lang::get('auth.change_email_waiting'));
                } else {
                    $user->email = $new_email;
                    $user->save();
                    return redirect()->route('verify.change_email')->with('changed', \Lang::get('auth.changed_email_successful'));
                }
            }
        }
        return redirect()->route('verify.change_email')->with('change_email_data_invalid', \Lang::get('auth.change_email_data_invalid'));
    }

}
