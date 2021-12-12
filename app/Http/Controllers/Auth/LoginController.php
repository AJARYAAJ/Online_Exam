<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function login(Request $request) {
        $userlogin = User::where(['email' => $request->email, 'password' => $request->password])->first();

        if (!empty($userlogin)) {
            $role = $userlogin->role;
            $id = $userlogin->id;
            $name = $userlogin->name;
            $email = $userlogin->email;

            session(['user_id' => $id]);
            session(['role' => $role]);
            session(['name' => $name]);
            session(['email' => $email]);

            if($role=="admin") {
                // global helper method
                $userID = session('user_id');
                $userName = session('name');

                Auth::guard('web')->login($userlogin);
                return redirect()->route('admin.home')->with(['success' => 'User Login successfully.']);
            } else {
                // global helper method
                $userID = session('user_id');
                $userName = session('name');

                Auth::guard('web')->login($userlogin);
                return redirect()->route('home')->with(['success' => 'User Login successfully.']);
            }
            
        } else {
            return redirect("login")->withSuccess('Login details are not valid');
        }
    }
}
