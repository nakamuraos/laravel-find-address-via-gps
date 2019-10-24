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
            $user_name = $request->user_name;
            $password = $request->password;
            if( Auth::attempt(['user_name' => $user_name, 'password' =>$password])) {
                if(Auth::user()->role_id == 1 ) {
                    return redirect()->intended('/admin/user');
                } else if(Auth::user()->role_id == 2 ) {
                    return redirect()->intended('/admin/address');
                }
                return redirect()->intended('/manager/address');
                
            } else {
                $errors = new MessageBag(['errorlogin' => Lang::get('error.login_error')]);

                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
}
