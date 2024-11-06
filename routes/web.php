<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', [HomeController::class, 'index']);

Route::get('/category/{category:uuid}', [HomeController::class, 'show']);

Route::get('/addMediaToPost', function () {
    // $offset = 0;
    // $posts = App\Models\Post::query()
    //     // ->with(['user', 'category'])
    //     ->limit(10)
    //     ->offset($offset)
    //     ->get();
    // foreach ($posts as $post) {
    //     $count = rand(3, 10);
    //     for ($i = 0; $i < $count; $i++) {
    //         $post->addMediaFromUrl('https://picsum.photos/600/400')->toMediaCollection();
    //     }
    // }
});
