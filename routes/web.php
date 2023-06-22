<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
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
Route::get('/listings/create', [ListingController::class, 'create']);

//store listing
Route::post('/listings', [ListingController::class, 'store']);

//Show edit form 
Route::get('/listings/{listing}/edit', [ListingController::class , 'edit']);

//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
