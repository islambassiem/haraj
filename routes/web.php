<?php

use App\Livewire\Ad;
use App\Livewire\Post;
use App\Livewire\Category;
use App\Livewire\EditPost;
use App\Livewire\ShowPost;
use App\Livewire\Chat\Chat;
use App\Livewire\Chat\Index;
use App\Livewire\CreatePost;
use App\Livewire\UploadImages;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploader;
use App\Http\Controllers\LocaleController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

Route::get('/', function () {
    return redirect('/category');
});

Route::get('/lang/{lang}', [LocaleController::class, 'syncDirection'])
    ->middleware(SetLocale::class)
    ->name('lang');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

Route::get('/download-seed', function () {
    // ini_set('max_execution_time', 0);
    // $path = storage_path('/app/public/photos/');
    // for ($id=0; $id <= 1084 ; $id++) {
    //     $url = "https://picsum.photos/id/$id/600/400";
    //     $headers = get_headers($url, 1);
    //     if (strpos($headers[0], '404')) continue;
    //     file_put_contents($path . $id . ".jpg", file_get_contents($url));
    // }
    // $files = collect(preg_grep('/^([^.])/', scandir($path)));
    // $posts = \App\Models\Post::all();
    // foreach ($posts as $post) {
    //     $count = mt_rand(5, 10);
    //     for ($i = 0; $i <= $count; $i++) {
    //         $post->addMedia($path . $files->random())
    //             ->preservingOriginal()
    //             ->toMediaCollection();
    //     }
    // }

});

Route::get('/category/{slug?}', Category::class)->name('category');
Route::get('/post/{post}', Post::class)->name('post');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/create', CreatePost::class)->name('create.post');
    Route::get('/posts/{post}/edit', EditPost::class)->name('edit.post');
    Route::get('/posts/{post}/show', ShowPost::class)->name('show.post');
    Route::get('/upload/{post_id}', UploadImages::class)->name('upload');
    Route::post('/upload-images', [ImageUploader::class, 'upload'])->name('image.upload');
    Route::post('/delete-image', [ImageUploader::class, 'delete'])->name('image.delete');

    Route::get('chat', Index::class)->name('chat.index');
    Route::get('chat/{query}', Chat::class)->name('chat');
});


