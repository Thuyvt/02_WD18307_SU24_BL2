<?php

namespace App\Http\Controllers\Auth\backup;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        // Gửi email verify
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($token, $user->name));
        // Login với user vừa tạo
        Auth::login($user);
        // gen lại token cho user vừa đăng nhập
        $request->session()->regenerate();

        // quay lại trang phía trước
        return redirect()->intended('/');
    }
}
