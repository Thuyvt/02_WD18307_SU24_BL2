<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        // hiển thị view trang đăng ký
//        dd('trang đăng ký');
        return view('auth.register');
    }

    public function register(Request $request) {
        // xử lý logic đăng ký
//        dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100', 'unique:users'],
            'password' =>['required', 'string', 'min:8', 'confirmed']
        ]);

        // tạo user mới
        $user = User::query()->create($data);
        // Login với user vừa tạo
        \Illuminate\Support\Facades\Auth::login($user);
        // gen lại token cho user vừa đăng nhập
        $request->session()->regenerate();

        // quay lại trang phía trước
        return redirect()->intended('/');
    }
}
