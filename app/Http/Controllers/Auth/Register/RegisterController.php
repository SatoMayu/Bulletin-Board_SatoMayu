<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    // use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerView()
    {
        return view ('auth.register.register');
    }

    public function registerPost()
    {
        return redirect('');
    }

    public function added()
    {
        return view('auth.register.added');
    }
}
