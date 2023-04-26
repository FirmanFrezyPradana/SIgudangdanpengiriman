<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            // dd("berhasil login");
            return redirect()->route('dashboardAdmin');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($validate)) {
            // dd("login berhasil");
            return redirect()->route('dashboardAdmin');
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function actionlogout(Request $request)
    {
        // dd('berhasil logout');
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
