<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $key, $key2 = '', $key3 ='')
    {
        $roles = User::getRoles(Auth::id());
        $access = false;

        foreach ($roles as $role):
            if ($role->role_description == "Admin"):
                $access = true;
            elseif ($role->role_description == $key):
                $access = true;
            elseif ($role->role_description == $key2):
                $access = true;
            elseif ($role->role_description == $key3):
                $access = true;
            endif;
        endforeach;

        if (!$access):
            abort(403, 'Unauthorized action.');
        endif;

        return $next($request);
    }

}
