<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Story;


//Route qui mène vers la page d'accueil, sans authentification nécessaire 
Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route protégée par l'authentification qui mène vers le tableau de bord où sont listées les histoires
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route protégée par l'authentification qui mène vers la page de lecture d'une histoire via son ID
//Grâce à Inertia, l'histoire est récupérée et envoyée en props à la page Story.vue
Route::middleware('auth')->group(function () {

    Route::get('/story/{id}', function ($id) {
        $story = Story::findOrFail($id); // récupère l'histoire depuis la BDD
        return Inertia::render('Story', [
            'story' => $story,
        ]);
    })->name('story.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

