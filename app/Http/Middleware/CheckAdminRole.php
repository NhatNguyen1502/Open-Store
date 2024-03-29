<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò là admin không
        if ($request->session()->has('role') && $request->session()->get('role') === 'admin') {
            // Nếu là admin, tiếp tục vào route tiếp theo
            return $next($request);
        }
        // Nếu không phải là admin, chuyển hướng đến trang đăng nhập
        return redirect('/login');
    }
}
