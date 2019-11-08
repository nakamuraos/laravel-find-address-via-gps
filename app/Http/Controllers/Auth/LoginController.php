<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Lang;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('pages.auth.login');
    }
    
    public function login(Request $request){
        $rules=[
            'user_name'=> 'required',
            'password'=> 'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $input = ['password' => $request->password];
            $input = array_merge($this->findUsername($request->user_name), $input);
            
            if(Auth::attempt($input)) {
                if(Auth::user()->status && Auth::user()->verified) {
                    return redirect()->route('home'); 
                } else {
                    if(!Auth::user()->verified) {
                        $errors = new MessageBag(['errorlogin' => Lang::get('auth.notyet_verify', ['url_resend_mail' => '/account/verify/resend_mail', 'url_change_email' => '/account/verify/change_email'])]);
                    } else if(!Auth::user()->status) {
                        $errors = new MessageBag(['errorlogin' => Lang::get('auth.account_blocked')]);
                    }
                    Auth::logout();
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            } else {
                $errors = new MessageBag(['errorlogin' => Lang::get('auth.login_error')]);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */

    public function findUsername($user_name)
    {
        $fieldType = filter_var($user_name, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        return [$fieldType => $user_name];
    }
}
