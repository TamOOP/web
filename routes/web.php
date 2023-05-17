<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;

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

Route::get('/', [
    HomeController::class,'index'
]);

Route::get('/products', function () {
    return view('user/product');
});

Route::get('/products/{id}', [
    ProductController::class,
    'detail'
]);

Route::get('/cart/{pid}',[
    CartController::class,'payment'
]);

Route::get('/cart',[
    CartController::class,'loadCart'
]);

Route::post('/upload',[ProductController::class,'store']);

Route::get('/delTempImg',[
    ProductController::class,
    'delTempImg'
]);

Route::get('/updateImg/{id}',[
    ProductController::class,
    'updateImg'
]);

Route::get('/login', function () {
    if(session('login') == 'true'){
        return redirect(session('prePage'));
    }
    else{
        return view('login');
    }
})->name('login');

Route::post('/login',[
    LoginController::class,'login'
]);

Route::get('/register', function () {
    return view('register');
});

Route::post('/register',[
    LoginController::class,'register'
]);

Route::get('/logout',[
    LoginController::class,'logout'
]);

Route::get('/account', [
    AccountController::class,'loadPage'
]);

Route::get('/brand', function () {
    return view('brand');
});

Route::post('/account/password',[
    AccountController::class,'changePass'
]);

Route::post('/account/profile',[
    AccountController::class,'changeProfile'
]);

Route::get('/loadHeader',function(){
    if(session('login') == 'true'){
        $user = DB::select('select * from member where mem_id= :uid',[
            'uid' => session('user')
        ]);
        $name_user = $user[0]->name;
        return response()->json(['name' => $name_user]);
    }
    return response()->json([]);
});

Route::post('/cart/quantity',[
    CartController::class,'updateQuantity'
]);

Route::post('/cart/remove',[
    CartController::class,'removeProduct'
]);

