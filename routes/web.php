<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\homecontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//user routes
Route::get('/', [authcontroller::class, 'login'])->name("login");

Route::get( '/register', [authcontroller::class, 'register']);
Route::post( '/postregister', [authcontroller::class, 'postregister']);

Route::get('/login', [authcontroller::class, 'login'])->name("login");
Route::post('/postlogin', [authcontroller::class, 'postlogin']);

Route::get('/logout', [authcontroller::class, 'logout']);


//home routes
Route::get('/home', [ homecontroller::class, 'index']);
Route::get('/addhotel', [ homecontroller::class, 'addhotelview']);
Route::post('/addhotels', [homecontroller::class, 'addhotels']);

Route::get('/addroom', [homecontroller::class, 'addroomview']);
Route::post('/addrooms', [homecontroller::class, 'addrooms']);

Route::get('/allhotel', [homecontroller::class, 'allhotels']);
Route::get('/allhotels', function () {
    return view('dashboard.allhotels');
});

Route::get('/allroom', [homecontroller::class, 'allrooms']);
Route::get('/allroomhotels', function () {
    return view('dashboard.allrooms');
});

//Route::post('/postlogin', [authcontroller::class, 'postlogin']);
