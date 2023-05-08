<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function actionlogin(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_pegawai == 1) {
                return redirect()->route('dashboardAdmin');
            }
        } else {
            return redirect()->route('login');
        }
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_pegawai == 2) {
                return redirect()->route('gudangdashboard');
            }
        } else {
            return redirect()->route('login');
        }
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_pegawai == 3) {
                return redirect()->route('penggunadashboard');
            }
        } else {
            return redirect()->route('login');
        }
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_pegawai == 4) {
                return redirect()->route('sopirdashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function actionlogout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
