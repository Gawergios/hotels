<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\hotelscontroller;
use App\Http\Controllers\roomscontroller;
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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function (){

//user routes
Route::get('/register', [usercontroller::class, 'register']);
Route::post('/postregister', [usercontroller::class, 'postregister']);

Route::get('/login', [usercontroller::class, 'login'])->name("login");
Route::post('/postlogin', [usercontroller::class, 'postlogin']);
Route::get('/logout', [usercontroller::class, 'logout']);


// hotels routes
Route::get('/addhotel', [hotelscontroller::class, 'addhotel']);
Route::post('/posthotel', [hotelscontroller::class, 'posthotel']);

Route::get('/addhotelimg', [hotelscontroller::class, 'addimg']);
Route::post('/addhotel/img', [hotelscontroller::class, 'postimg']);

Route::get('/allhotels', [hotelscontroller::class, 'allhotels'])->middleware('verified');

Route:: get('/updatehotel/{id}', [hotelscontroller::class, 'updatehotel']);
Route::post('/updateh/{id}', [hotelscontroller::class, 'updateh']);
Route::get('/deletehotel/{id}', [hotelscontroller::class, 'deletehotel']);



// rooms routes
Route::get('/addroom', [roomscontroller::class, 'addroom']);
Route::post('/postroom', [roomscontroller::class, 'postroom']);

Route::get('/addroomimg', [roomscontroller::class, 'addimg']);
Route::post('/addroom/img', [roomscontroller::class, 'postimg']);

Route::get('allrooms/{id}', [roomscontroller::class, 'allrooms']);

    Route::get('/updateroom/{id}', [roomscontroller::class, 'updateroom']);
    Route::post('/editroom/{id}', [roomscontroller::class, 'editroom']);
    Route::get('/deleteroom/{id}', [roomscontroller::class, 'deleteroom']);





});

//home routes
Route::get('/', [homecontroller::class, 'home']);
Route::get('hoteldetails/{id}', [homecontroller::class, 'hoteldetails']);
Route::get('roomdetails/{id}', [homecontroller::class, 'roomdetails']);







// Route::get('/addhotel', [ homecontroller::class, 'addhotelview']);
// Route::post('/addhotels', [homecontroller::class, 'addhotels']);

// Route::get('/addroom', [homecontroller::class, 'addroomview']);
// Route::post('/addrooms', [homecontroller::class, 'addrooms']);

// Route::get('/allhotel', [homecontroller::class, 'allhotels']);
// Route::get('/allhotels', function () {
//     return view('dashboard.allhotels');
// });

// Route::get('/allroom', [homecontroller::class, 'allrooms']);
// Route::get('/allroomhotels', function () {
//     return view('dashboard.allrooms');
// });

//Route::post('/postlogin', [authcontroller::class, 'postlogin']);
