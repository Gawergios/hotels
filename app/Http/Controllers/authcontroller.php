<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
//use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Session;

class authcontroller extends Controller
{
    public function register(){
        return view('register');
    }
    public function postregister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',

        ]);
        //$user =User::create($validated);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if($user->save()){
            Session::flash('message', 'user created successfully');
        }

        // if($user){
        //     alert()->success('SuccessAlert', 'Register Successful');
        // }
        return Redirect("/register");
    }

    public function login()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
        $req = $request->only("email", "password");
        if (Auth::attempt($req)) {
            return Redirect("/addhotel");
        }else{
            Session::flash('message', 'User Not registed');
            return Redirect("/login");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect("login");
    }
}
