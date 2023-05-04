<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        }
        return view('login');
    }

    public function actionlogin(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route('dashboardAdmin');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
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
