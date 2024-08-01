<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // cek apakah user status = active
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Akun Anda Belum Aktif, Silahkan Kontak Admin');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Username atau Password Salah');
                return redirect('/login');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
        'username' => 'required|unique:users|max:255',
        'password' => 'required|max:255',
        'nama' => 'max:30',
        'telepon' => 'required|max:30',
        'alamat' => 'max:255',
        ]);

        $validated['password'] = Hash::make($request->password);
        $user = User::create($validated);

        Session::flash('message', 'Registrasi berhasil. Tunggu admin untuk mengaktifkan akun');
        return redirect('register');
    }
}
