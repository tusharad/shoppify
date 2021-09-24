<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function signUp(Request $req){
        $user = new User;
        $user->user_name = $req->userName;
        $user->email = $req->email;
      //  $user->phone = $req->phone;
       // $user->address = $req->address;
        $user->password = Hash::make($req->password);
       $user->save();
      return redirect('/login')->with('status', 'User registered!');;
      //  return $req->post();
    }

    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!Hash::check($req->password,$user->password)){
            return redirect('/login')->with('status', 'wrong password!!');
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
