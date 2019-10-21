<?php

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

Route::get('/listings/{slug}', function ($slug) {
    $listing = App\Listing::where('slug', $slug)->firstOrFail();
    return view('listing')->with('listing', $listing);
})->name('listing');

Route::get('/', function () {
    return view('welcome');
});


Route::view('/test', 'listing');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
