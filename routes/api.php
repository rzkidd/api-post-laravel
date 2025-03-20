<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function (){
    return 'Hello, World!';
});

Route::post('/adduser', function (Request $request){
    $request  = $request->json();
    $name     = $request->get('name');
    $email    = $request->get('email');
    $password = $request->get('password');

    $user     = App\Models\User::create([
        'name'     => $name,
        'email'    => $email,
        'password' => $password,
    ]);

    return response()->json([
        'status' => true,
        'data'   => $user,
    ], 201);
});