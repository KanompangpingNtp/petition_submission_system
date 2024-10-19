<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // จัดการการลงทะเบียน
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // แสดงฟอร์มเข้าสู่ระบบ
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // จัดการการเข้าสู่ระบบ
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // เพิ่มข้อความ success
            return redirect()->route('dashboardUser')->with('success', 'เข้าสู่ระบบสำเร็จ!');
        }

        return back()->withErrors([
            // 'email' => 'The provided credentials do not match our records.',
            'email' => 'อีเมลที่กรอกไม่ถูกต้อง',
        ]);
    }

    // จัดการการออกจากระบบ
    public function logout()
    {
        Auth::logout();
        return redirect()->route('usersform.index')->with('success', 'ออกจากระบบสำเร็จแล้ว!');
    }
}
