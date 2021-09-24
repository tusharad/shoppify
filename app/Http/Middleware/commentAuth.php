<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;


class commentAuth
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
        $count = Order::where('product_id', $request->product_id)->where('user_id',$request->session()->get('user')['id'])->count();
        return ($count == 0) ? redirect('/')->with('status','Cannot post comment unless you have bought the product!') : $next($request) ; 
    }
}
