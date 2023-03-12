<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
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

    public function loginView()
    {
        return view('auth.login.login');
    }

    public function loginPost(Request $request)
    {
        $userdata = $request->only('email', 'password');
        if (Auth::attempt($userdata)) {
            return redirect('/top');
        } else {
            return redirect('/login')->with('flash_message', 'name or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
