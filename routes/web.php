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
Route::post('/result', 'giveaway@requestFromAPI');
Route::get('/contact', function(){
  return redirect('https://www.reddit.com/message/compose/?to=iPlayZombies2&subject=%5BQuestion%2FSuggestion%5DBolt%20for%20Reddit&message=Please%20keep%20the%20subject%20the%20same%20');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error/{text}', function () {
    return View::make('layouts.error')->with('status', 'Sorry, we encountered an error with your karma option');
})->name('error');
