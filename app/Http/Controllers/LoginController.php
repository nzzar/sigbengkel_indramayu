<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('userpage.auth.login');
    }

    public function login_proses(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->role === 'admin' || $user->role === 'owner') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home');
        }
    } else {
        return redirect()->route('login')->with('error', 'Email atau Password Salah');
    }
}


    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Berhasil Logout');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $pemilik['name'] = $request->name; // Ubah dari 'nama' ke 'name'
        $pemilik['email'] = $request->email;
        $pemilik['password'] = Hash::make($request->password);

        User::create($pemilik);

        return redirect()->route('login')->with('success','Registrasi berhasil, silakan login.');
    }

}
