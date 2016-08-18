<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Config;
use Exception;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        try{
            $user = User::where('name', $request->get('username'))->first();
            if($user){
                $password = decrypt($user->password,Config::get('app.key'));
                if ($password == $request->get('password')) {
                    Auth::login($user);
                    if($user->role_id != 1){
                        return redirect('user/index');        
                    }else{
                        return redirect('admin/index');
                    }   
                }
            }
            else{
                flash()->overlay('Account Not Found, Try Again!', 'Notification');
                return redirect('auth/login');
            }
        }catch (Exception $ex){
            flash()->overlay('Sign In Error, Try Again!', 'Notification');
            return redirect('auth/login');
        }
    }
}
