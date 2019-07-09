<?php

use Illuminate\Http\Request;
use App\Rank;
use App\Cadre;
use App\State;
use App\Lga;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
 
// Route::get('articles/{id}', function($id) {
//     return Article::find($id);
// });

Route::get('v1/get-lgoo/{id}', function($id) {
    $data = State::find($id)->lgas;
    return response()->json($data);
});

Route::get('v1/get-lgor/{id}', function($id) {
    $data = State::find($id)->lgas;
    return response()->json($data);
});

Route::get('v1/get-ranks/{cadre}', function($cadre) {
    $data = Cadre::find($cadre)->ranks;
    return response()->json($data);
});