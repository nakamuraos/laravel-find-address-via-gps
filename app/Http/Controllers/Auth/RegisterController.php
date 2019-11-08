<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    
    public function index(){
        return view('pages.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request) {
        $rules = [
             'user_name' => 'required|min:6',
             'email' => 'required|email|unique:users',
             'password' => 'required|confirmed|min:6'
        ];
    
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $newUser = new User();
        $newUser->user_name = $request->user_name;
        $newUser->email = $request->email;
        $newUser->phone = $request->phone;
        $newUser->full_name = $request->full_name;
        $newUser->password = bcrypt($request->password);
        $newUser->role_id = 3;
        $newUser->verify_token = $this->createVerifyToken($request->user_name . $request->email);
        $newUser->verify_exprie = date('Y-m-d H:i:s', time() + 30 * 60); //30 minutes
        $newUser->save();

        //if(config('app.env') === 'production') 
        $this->sendMailActivation($newUser);

        return redirect('/login')->with('success', \Lang::get('auth.register_success', ['url_verify' => '/account/verify']));
    }
}
