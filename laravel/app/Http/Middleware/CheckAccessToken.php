<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Registry\Registry;
use App\Models\Collaborator;

class CheckAccessToken
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $access_token = $request->header('token');

        $collaborator = Collaborator::getCollaboratorByAccessToken($access_token);
//        dd($collaborator);
        Registry::register('access_token', $access_token);
        Registry::register('current_collaborator', $collaborator);
        return $next($request);
    }
}
