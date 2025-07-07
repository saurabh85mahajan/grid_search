<?php

// app/Http/Controllers/ImpersonationController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ImpersonateController extends Controller
{
    public function start(User $user)
    {
        
		if($user->organisation_id == 1){
			$organisation = 'llc';
		}else{
			$organisation = 'ppc';
		}
		
		// Only allow impersonation if current user is admin and not already impersonating
        
		if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'You are not authorized to impersonate users.');
        }

        $adminId = Auth::id();
		
        Auth::logout();
		
		session()->flush();
		
		Auth::guard('web')->login($user);
		
		Session::put('impersonate_original_id', $adminId);
		
		session()->save();
		
        return redirect("/{$organisation}/dashboard")->with('message', "Now impersonating {$user->name}");
    }

}
