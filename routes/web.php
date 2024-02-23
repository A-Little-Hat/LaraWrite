<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user(); 
    return view('dashboard')->with('user', $user);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/render', function () {
    // $user = Auth::user(); 
    return "view('render')";
})->name('render');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/upload', [UploadController::class, 'store'])->name('upload');

Route::get('/post/addpost', [PostController::class, 'addPost'])->middleware(['auth', 'verified']);
Route::get('/post/all', [PostController::class, 'viewAllPost']);
Route::get('/post/username/{name}', [PostController::class, 'viewPost']);
Route::get('/post/delete/{postid}', [PostController::class, 'deletePost'])->middleware(['auth', 'verified']);
Route::get('/post/update/{postid}', [PostController::class, 'updatePostData'])->middleware(['auth', 'verified']);
Route::post('/post/update/{postid}', [PostController::class, 'updatePost'])->middleware(['auth', 'verified']);

Route::get('/post/like/add/{postid}', [LikeController::class, 'likePost'])->middleware(['auth', 'verified']);
Route::get('/post/like/remove/{postid}', [LikeController::class, 'dislikePost'])->middleware(['auth', 'verified']);
Route::post('/post/like/count/{postid}', [LikeController::class, 'count'])->middleware(['auth', 'verified']);

Route::get('/demo', [PostController::class, 'demo']);



require __DIR__.'/auth.php';
