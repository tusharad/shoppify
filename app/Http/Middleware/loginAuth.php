<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class loginAuth
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
        $checkEmail = User::where('email',$request->email)->first();
        if($checkEmail === null){
            return redirect('/login')->with('status', 'Email not found!!');
        }
        return $next($request);
    }
}
