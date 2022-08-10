<?php

namespace App\Http\Middleware;

use App\Helpers\RajaOngkir;
use App\Models\Auth as ModelsAuth;
use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!ModelsAuth::where([
            'username' => $request->header('username'),
            'password' => $request->header('password'),
            ]
        )->first()) {
            return response()->json([
                'code' => 403,
                'message' => 'Perlu Authorisasi terlebih dahulu!',
            ]);
        }
        return $next($request);
    }
}
