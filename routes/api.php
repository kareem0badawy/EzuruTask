<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::namespace('API')->group(function () {
    Route::get('v2/sortedby/stars','PopularRepoController@index');
    Route::get('v2/topRepo/','PopularRepoController@topRepo');
    Route::get('v2/filterbydate/','PopularRepoController@filterByDate');
});