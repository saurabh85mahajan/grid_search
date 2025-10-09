<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EnsureUserIsGrid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('grid/login') || $request->is('grid')) {
            
			if (auth()->check()) {
                $user = auth()->user();
				if ($user->organisation_id != 4 || $user->is_active != 1) {
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
            auth()->user()->organisation_id != 4 ||
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
