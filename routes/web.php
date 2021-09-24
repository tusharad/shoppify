<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductController::class,'index']);
Route::get('/shop',[ProductController::class,'shop']);
Route::get('/shop/{id}',[ProductController::class,'category']);

Route::get('/login', function () {
    return view('loginPage');
})->middleware('loginVal');

Route::get('/admin', function () {
    return view('adminPage');
})->middleware('isAdmin');

Route::get('/signup', function () {
    return view('signUpPage');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::post('/posting', [ProductController::class, 'store']);



Route::post('/signupAuth',[UserController::class,'signUp'])->middleware('signupAuth');
Route::post('/loginAuth',[UserController::class,'login'])->middleware('loginAuth');
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::post('postComment',[ProductController::class,'postComment'])->middleware('commentAuth');
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{id}',[ProductController::class,'removeCart']);
Route::get('/ordernow',[ProductController::class,'orderNow']);
Route::post('/orderplace',[ProductController::class,'orderPlace']);
Route::get('/myorders',[ProductController::class,'myOrders']);

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});
