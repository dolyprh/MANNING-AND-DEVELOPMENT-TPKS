<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LoginModel;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function view_login()
    {
        return view('login.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );
        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
            // 'aktif' => $request->aktif
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/')->with('toast_success', 'Berhasil Login');
        } else {
            return redirect('/login')->with('toast_error', 'Username dan Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/logout')->with('toast_success', 'Berhasil Logout');
    }
}
