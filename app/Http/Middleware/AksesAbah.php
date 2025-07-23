<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AksesAbah
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedUserIds = [
            63, //Abah 
            54, //Muslim
            120, //Kuntono
            121, //Dani
            122 //Sholihatun

        ]; // Contoh: Hanya user dengan ID 63 danyang diizinkan

        if (Auth::guard('api')->check() && in_array(Auth::guard('api')->id(), $allowedUserIds)) {
            return $next($request);
        }

        // Jika tidak diizinkan, kembalikan respons 403 Forbidden
        return response()->json(['message' => 'Anda tidak diizinkan mengakses sumber daya ini.'], 403);
    }
}
