<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;

class EnsureUserIsPpc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('ppc/login') || $request->is('ppc')) {
            if (auth()->check()) {
                $user = auth()->user();

                if ($user->organisation_id != 2 || $user->is_active != 1) {
                    auth()->logout();
                    throw ValidationException::withMessages([
                        'data.email' => 'This is not a Valid Account. Please contact Administrator',
                    ]);
                }
            }
            return $next($request);
        }

        if (
            !auth()->check() ||
            auth()->user()->organisation_id != 2 ||
            auth()->user()->is_active != 1
        ) {

            auth()->logout();
            throw ValidationException::withMessages([
                'data.email' => 'This is not a Valid Accounts. Please contact Administrator',
            ]);
        }

        return $next($request);
    }
}
