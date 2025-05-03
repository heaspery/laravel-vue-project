<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChapterAPIController;
use App\Http\Controllers\ChoiceAPIController;
use App\Http\Controllers\StoryAPIController;
use App\Http\Controllers\GameHistoryAPIController;
use App\Http\Controllers\UserAPIController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Chapter API Routes
Route::get('/chapters', [ChapterAPIController::class, 'getChapters']);
Route::get('/chapters/{id}', [ChapterAPIController::class, 'getChapter']);
Route::get('/stories/{story_id}/chapters', [ChapterAPIController::class, 'getChaptersByStory']);
Route::post('/chapters', [ChapterAPIController::class, 'createChapter']);
Route::put('/chapters/{id}', [ChapterAPIController::class, 'updateChapter']);
Route::delete('/chapters/{id}', [ChapterAPIController::class, 'deleteChapter']);

//Choice API Routes
Route::get('/choices', [ChoiceAPIController::class, 'getChoices']);
Route::get('/choices/{id}', [ChoiceAPIController::class, 'getChoice']);
Route::post('/choices', [ChoiceAPIController::class, 'createChoice']);
Route::put('/choices/{id}', [ChoiceAPIController::class, 'updateChoice']);
Route::delete('/choices/{id}', [ChoiceAPIController::class, 'deleteChoice']);

//Story API Routes
Route::get('/stories', [StoryAPIController::class, 'getStories']);
Route::get('/stories/{id}', [StoryAPIController::class, 'getStory']);
Route::post('/stories', [StoryAPIController::class, 'createStory']);
Route::put('/stories/{id}', [StoryAPIController::class, 'updateStory']);
Route::delete('/stories/{id}', [StoryAPIController::class, 'deleteStory']);

//Game History API Routes
Route::get('/game-histories', [GameHistoryAPIController::class, 'getGameHistories']);
Route::get('/game-histories/{id}', [GameHistoryAPIController::class, 'getGameHistory']);
Route::post('/game-histories', [GameHistoryAPIController::class, 'createGameHistory']);
Route::put('/game-histories/{id}', [GameHistoryAPIController::class, 'updateGameHistory']);
Route::delete('/game-histories/{id}', [GameHistoryAPIController::class, 'deleteGameHistory']);

//User API Routes
Route::get('/users', [UserAPIController::class, 'getUsers']);
Route::get('/users/{id}', [UserAPIController::class, 'getUser']);