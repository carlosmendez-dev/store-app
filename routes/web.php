<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// importamos la facade Auth
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Tag;

use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::apiResource("tag",TagController::class);
Route::apiResource("article",ArticleController::class);


Route::get('dashboard', function () {
    return Inertia::render('Dashboard',[
        "user"=>Auth::user(),
        "articles"=>Article::all(),
        "tags"=>Tag::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
