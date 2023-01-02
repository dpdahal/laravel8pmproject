<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        if ($request->isMethod('get')) {
            if (Auth::check()) {
                return redirect()->route('dashboard');
            }

            return view('auth.login');
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required'
            ]);
            $username = $request->username;
            $password = $request->password;

            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }

        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
