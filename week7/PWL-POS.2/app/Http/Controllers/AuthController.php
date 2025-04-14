<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            try {
                if (Auth::attempt($credentials)) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Login Berhasil',
                        'redirect' => url('/')
                    ]);
                }

                return response()->json([
                    'status' => false,
                    'message' => 'Login Gagal'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Terjadi Kesalahan : ' . $e->getMessage()
                ]);
            }
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function register()
{
    // Menampilkan halaman form registrasi
    return view('auth.register');
}

public function postRegister(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:50',
        'username' => 'required|string|unique:m_user,username|max:50',
        'password' => 'required|confirmed|min:6',
    ]);

    // Simpan data user ke dalam database
    UserModel::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'level_id' => 3
    ]);

    // Redirect ke login dengan pesan sukses
    return redirect('login')->with('success', 'Registrasi berhasil! Silakan login.');
}
    
}