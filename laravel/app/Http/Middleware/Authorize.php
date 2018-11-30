<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
class Authorize
{
    use AuthorizesRequests;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $ability, $attributes = [])
    {   
        // $this->authorize($ability, $attributes);
        $user = Auth::user();
        if($user->roles()->where('name','administrator')->count()==0){
            return redirect('admin/');
        }
        return $next($request);
    }
}
