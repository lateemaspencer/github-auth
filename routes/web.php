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
use App\User;

Route::get('/', function () {
	
    return view('welcome');
});

Route::get('dashboard', function() {
	$client = new GuzzleHttp\Client();
	$user = User::first();
	
	$response = $client->get($user->repos_url)->getBody();
	$repositories = json_decode($response);
	return view('dashboard', ['repositories' => $repositories]);

})->middleware('auth');

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('logout', function(){
	Auth::logout();

	return redirect('/');
});