<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // ตรวจสอบว่าใช้ guard ของ admin และ admin ล็อกอินหรือไม่
         if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login'); // ถ้าไม่ใช่ admin จะถูกส่งไปยังหน้า login
        }

        return $next($request);
    }
}
