<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsPatient
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type === 'user') {
            $user = User::query()->where('id', Auth::id())->first();
            if ($user) {
                return $next($request);
            }
            return redirect()->route('patient.home')->with('error', __('message.Your account is delete please call supports'));
        }

        return redirect()->route('login');
    }
}
