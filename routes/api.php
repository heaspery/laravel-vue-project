<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterAPIController;
use App\Http\Controllers\StoryAPIController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get(uri: 'ping', action: function() {
    return response()->json(['message' => 'pong'], 200);
})->name('api.ping');



//Chapter API Routes
Route::get('/chapters', [ChapterAPIController::class, 'getAllChapters']);
Route::post('/chapters/create', [ChapterAPIController::class, 'createChapter']);

//Choice API Routes



//Story API Routes
Route::post('/stories/create', [StoryAPIController::class, 'createStory']);



//Game History API Routes