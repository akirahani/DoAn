<?php

namespace App\Http\Middleware;
use App\Models\Admin;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckPermission
{

    public function handle(Request $request, Closure $next)
    {
        $route = $request->route()->getName();
        $user= Auth::user();
        $user= Admin::find($user->id);
         if( $user->hasRole($route)){
             return $next($request);
         }
         abort(403);
    }
}
