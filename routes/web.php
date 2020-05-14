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
Route::resource('listing', 'ListingController');

Route::get('/listings', 'ListingController@index');
Route::view('/listings/edit', 'listing.edit');

Route::get('/listings/{slug}', function ($slug) {
  $listing = App\Listing::where('slug', $slug)->firstOrFail();
  return view('listing.listing')->with('listing', $listing);
})->name('listing');

Route::get('/{name}', array(
    'as' => 'home', 
    'uses' => 'ListingController@pull'),
    function() {
      return redirect()->action(
        'ListingController@pull', ['top']
      );  
     
    })->where('name', 'home|');