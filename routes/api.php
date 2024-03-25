<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CatogryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/categories',[CatogryController::class,'get']);
Route::get('/categories',[BrandsController::class,'get']);
