<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout()
    {
        auth()->logout();
        session()->forget('name');
        return redirect('/welcome');
    }
    ///
    // -------------------- [ user registration view ] -------------
    public function index() {
        return view('Auth.register');
    }
    // -------------------- [ User login view ] -----------------------
    public function userLoginIndex() {
        return view('Auth.login');
    }
   /* public function login(Request $request){
        return view('Auth.login');
    }*/

    public function userPostLogin(Request $request) {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required"
        ]);

        $userCredentials = $request->only('email', 'password');
        //$user = User::where('email', '=', $request->email)->where('password', '=', $request->password);
        // check user using auth function
        /*Auth::attempt($userCredentials);
        return view('welcome');*/
        if (Auth::attempt($userCredentials)){
           // dd('Auth');
            //return view('welcome');
            return redirect()->intended('dashboard');
        }else{
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }

    public function userPostRegistration(Request $request)
    {

        // validate form fields
        $request->validate([
            'Name'        =>      'required',
            'email'             =>      'required|email',
            'password'          =>      'required|min:6',
            'confirm_password'  =>      'required|same:password',
        ]);
        $input          =           $request->all();
        // if validation success then create an input array
        $inputArray      =           array(
            'Name'        =>      $request->name,
            'email'             =>      $request->email,
            'password'          =>      Hash::make($request->password),
        );
        // register user
        $user           =           User::create($inputArray);

        // if registration success then return with success message
        if(!is_null($user)) {
            return back()->with('success', 'You have registered successfully.');
        }

        // else return with error message
        else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }
    }


    }
