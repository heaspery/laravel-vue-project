<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterAPIController;
use App\Http\Controllers\ChoiceAPIController;
use App\Http\Controllers\StoryAPIController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Chapter API Routes
Route::get('/chapters', [ChapterAPIController::class, 'getChapters']);
Route::post('/chapters', [ChapterAPIController::class, 'createChapter']);
Route::get('/chapters/{id}', [ChapterAPIController::class, 'getChapter']);
Route::put('/chapters/{id}', [ChapterAPIController::class, 'updateChapter']);
Route::delete('/chapters/{id}', [ChapterAPIController::class, 'deleteChapter']);

//Choice API Routes
Route::get('/choices', [ChoiceAPIController::class, 'getChoices']);
Route::get('/choices/{id}', [ChoiceAPIController::class, 'getChoice']);
Route::post('/choices', [ChoiceAPIController::class, 'createChoice']);
Route::put('/choices/{id}', [ChoiceAPIController::class, 'updateChoice']);


//Story API Routes
Route::post('/stories/create', [StoryAPIController::class, 'createStory']);



//Game History API Routes