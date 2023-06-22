<?php

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

//all listings
Route::get('/', function () {
    return view('listings', [
        'listings' =>  Listing::all()
    ]);
});

//single listing
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' =>  $listing
    ]);

    // $listing = Listing::find();
    // if ($listing) {
    //     return view('listing', [
    //         'listing' =>  $listing
    //     ]);
    // } else {
    //     abort('404');
    // }
});


Route::get('/hello', function () {
    return response('<b>Heya</b>', 200)
        ->header('Content-Type', 'text/plain');
});

Route::get('/posts/{id}', function ($id) {
    ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    return $request->name . ' ' . $request->city;
});
