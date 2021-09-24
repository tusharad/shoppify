<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class signupAuth
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
        $user = new User;
        $confirmPassword = $request->confirmPassword;
        $password = $request->password;
        $checkEmail = User::where('email',$request->email)->first();
        if($checkEmail != null){
            return redirect('/signup')->with('status', 'Email already exists!');
        }
        // $checkPhone = User::where('phone',$request->phone)->first();
        // if($checkPhone != null){
        //     return redirect('/signup')->with('status', 'Phone already exists!');
        // }
        if($password !==  $confirmPassword){
            return redirect('/signup')->with('status','passwords dont match');
        }
        return $next($request);
    }
}
