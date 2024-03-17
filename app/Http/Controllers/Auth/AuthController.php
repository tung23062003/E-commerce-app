<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view(){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return to_route('dashboard');
            }
            return to_route('home');
        }
        return view('backend.Auth.login');
    }
    public function register_view(){
        return view('backend.Auth.register');
    }

    public function login(LoginRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 'admin'){
                return to_route('dashboard')->with('success', 'Đăng nhập thành công');
            }
            return to_route('home')->with('success', 'Đăng nhập thành công');
        }
        // toastr()->error('Tài khoản hoặc mật khẩu không chính xác');
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login.index')->with('success', 'Đăng xuất thành công');
    }
    
    public function register(RegisterRequest $request, User $user){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return to_route('login.index')->with('success', 'Đăng ký thành công');
    }
}
