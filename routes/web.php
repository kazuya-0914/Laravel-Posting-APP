<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostVueController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

Route::get('/posts', function () {
    $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->get();
    $user_name = Auth::user()->name;

    return Inertia::render('Posts/Index', [
        'user_name' => $user_name,
        'posts' => $posts,
    ]);
})->middleware(['auth', 'verified'])->name('posts');

require __DIR__.'/auth.php';

/* --- 教材コード --- */
// Bladeバージョン
Route::get('/', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');
Route::resource('posts', PostController::class)->middleware(['auth', 'verified']);

/*
Route::prefix('posts')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [PostController::class, 'index'])->name('posts.index');
    Route::post('', [PostController::class, 'store'])->name('posts.store');
    Route::get('create', [PostController::class, 'create'])->name('posts.create');
    Route::get('{post}', [PostController::class, 'show'])->name('posts.show');
});
*/

// Vue.js3バージョン
Route::prefix('posts-vue')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [PostVueController::class, 'index'])->name('posts.vue.index');
    Route::post('', [PostVueController::class, 'store'])->name('posts.vue.store');
    Route::get('create', [PostVueController::class, 'create'])->name('posts.vue.create');
    Route::get('{post}', [PostVueController::class, 'show'])->name('posts.vue.show');
});

// Reactバージョン

// 共通
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');