<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function postregister(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email:rfc,dns|unique:users',
            'phone'   => 'required|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        //dd($validated);
        // $user = User::create($validated);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        if ($save) {
            alert()->success('Success Alert', 'congratulations, your account has been successfully created');
            return Redirect('register');
        }
    }

    public function login()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
        $r = $request->only('email', 'password');
        $auth = Auth::attempt($r);
        if ($auth) {
            return redirect('allhotels');
        } else {
            Session()->flash('message', 'User Not registered');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
