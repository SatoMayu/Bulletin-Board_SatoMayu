<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use DB;
use App\Models\Users\User;
use App\Http\Requests\RegisterFormRequest;

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

    public function registerPost(RegisterFormRequest $request)
    {
        // dd($request);
        DB::beginTransaction();
        try{
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            DB::commit();
            return  view('auth.register.added');

        }catch(\Excption $e){
            DB::rollback();
            return redirect()->route('loginView');
        }
    }

    public function added()
    {
        return view('auth.register.added');
    }
}
