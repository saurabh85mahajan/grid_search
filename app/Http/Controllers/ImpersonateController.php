<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ImpersonateController extends Controller
{
    public function __invoke(User $user)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        $redirectUrl = $this->getRedirectUrl($user->organisation_id);

        Auth::logout();

        session()->flush();

        Auth::guard('web')->login($user);

        session()->save();

        return redirect($redirectUrl);
    }

    private function getRedirectUrl($organisationId)
    {
        if ($organisationId == 1) {
            return '/llc/dashboard';
        } elseif ($organisationId == 2) {
            return '/ppc/dashboard';
        }  elseif ($organisationId == 3) {
            return '/demo/dashboard';
        }

        return '/dashboard';
    }
}
