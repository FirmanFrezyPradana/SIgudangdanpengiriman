<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }
    public function actionregister(Request $request)
    {
        $validate = $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required',
            'password' => 'required|min:8',
        ]);
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        return redirect()->route('login');
    }
}
