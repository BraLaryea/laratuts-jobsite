<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Route::get('/hello', function () {
//     return response('<b>Heya</b>', 200)
//         ->header('Content-Type', 'text/plain');
// });

// Route::get('/posts/{id}', function ($id) {
//     ddd($id);
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });


//all listings
Route::get('/', [ListingController::class, 'index']);

// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//show edit form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// update listing 
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete listing 
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show register user form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store']);

// log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
