<?php

use App\Events\AppleAnnouncement;
use App\Events\GameCreated;
use App\Events\SessionCreated;
use App\Session;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->post(
    '/broadcast/auth',
    'BroadcastAuthController@auth'
);

// Camel Case and Authentication
Route::group(['middleware' => ['auth:api', 'camel.case']], function () {
    // Games
    Route::get('/games', 'GameController@index');
    Route::get('/games/{game}', 'GameController@show');

    // Users
    Route::apiResource('users', 'UserController', [
        'except' => ['store', 'show'],
    ]);
    Route::get('users', 'UserController@show');

    // Lobbies
    Route::apiResource('sessions', 'SessionController');
});

// Camel Case Only
Route::group(['middleware' => ['camel.case']], function () {
    // Users
    Route::apiResource('users', 'UserController', ['only' => 'store']);

    // Access Tokens
    Route::middleware('api.auth.basic.once')->post(
        '/accessTokens',
        'AccessTokenController@store'
    );
});

Route::get('/sendInvite', function () {
    $user = User::find(2);

    $session = Session::find(57);
    //
    //    event(new GameCreated($user, $session));

    (new \App\SMS\GameInvite($user, $session, [
        '4408657368',
        '4403392655',
    ]))->send();

    return response()->json();
});
