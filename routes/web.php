<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/post/addpost', [PostController::class, 'addPost']);
Route::get('/post/all', [PostController::class, 'viewAllPost']);
Route::get('/post/username/{name}', [PostController::class, 'viewPost']);
Route::get('/post/delete/{postid}', [PostController::class, 'deletePost']);
Route::get('/post/update/{postid}', [PostController::class, 'updatePostData']);
Route::post('/post/update/{postid}', [PostController::class, 'updatePost']);


require __DIR__.'/auth.php';
