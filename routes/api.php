<?php

use App\Http\Controllers\NewsController;
use App\Http\Resources\Contact as ContactResource;
use App\Models\Contact;
use App\Models\Slide;
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

Route::get('slides', function () {
    return Slide::all();
})->name("slides");

Route::get('contacts', function () {
    return ContactResource::collection(Contact::all());
})->name('contacts');

Route::get('news', NewsController::class);
