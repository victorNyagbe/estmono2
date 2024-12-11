<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class CheckAuthenticatedAdmin
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
        $check_admin = User::where([
            ['id', session()->get('id')],
            ['email', session()->get('email')]
        ])->first();

        if ($check_admin == null) {
            return redirect()->route('admin.user.login_view')->with('error', 'Informations de connexion invalides');
        }

        return $next($request);
    }
}
