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

use App\Mail\GameInvite;
use App\Session;
use App\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/join/{code}', function (Request $request, $code) {
    dd($code);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('mailable', function () {
    $user = User::find(2);

    $session = Session::find(44);

    return new GameInvite($user, $session);
});
