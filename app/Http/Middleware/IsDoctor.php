<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsDoctor
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type === 'doctor') {
            $doctor = User::query()->where('id', Auth::id())->first();
            if ($doctor) {
                return $next($request);
            }
            return redirect()->route('patient.home')->with('error', __('message.Your account is delete please call supports'));
        }

        return redirect()->route('login');
    }
}
