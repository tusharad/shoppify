<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

use function PHPUnit\Framework\returnSelf;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('user')['isAdmin'])
            return $next($request);
        else
            return redirect('/')->with('status','You are not admin!');
    }
}
