<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Friend;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    if(Auth::user()->type ==='admin'){
        return view('dashboard');
    }
    else{
        $posts = Post::all();
         return view('posts.index', compact('posts'));
    }
})->name('dashboard');

Route::group([
    'middleware' => ['auth','isAdmin'],'prefix'=>'admin'],function () {
    
});

Route::group([
    'middleware' => ['auth','verified']], function () {
     

    Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');
    Route::get('post/create', [App\Http\Controllers\PostController::class, 'create']);
    Route::post('post', [App\Http\Controllers\PostController::class, 'store']);
    Route::get('post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit']);
    Route::get('post/{post}', [App\Http\Controllers\PostController::class, 'show']);
    Route::put('post/{post}', [App\Http\Controllers\PostController::class, 'update']);
    Route::delete('post/{post}', [App\Http\Controllers\PostController::class, 'destroy']);


    Route::post('comment', [App\Http\Controllers\CommentController::class, 'index']);
    Route::post('placeComment', [App\Http\Controllers\CommentController::class, 'placeComment']);

    Route::get('friends',[App\Http\Controllers\UserController::class, 'index'])->name('friends');
    Route::post('addFriends', [App\Http\Controllers\UserController::class, 'addFriend']);
    Route::post('deleteFriendship', [App\Http\Controllers\UserController::class, 'deleteFriendship']);



    Route::get('places',[App\Http\Controllers\PlaceController::class, 'index'])->name('places');
    Route::get('place/create', [App\Http\Controllers\PlaceController::class, 'create']);
    Route::post('place', [App\Http\Controllers\PlaceController::class, 'store']);
    Route::get('place/{place}/edit', [App\Http\Controllers\PlaceController::class, 'edit']);
    Route::get('place/{place}', [App\Http\Controllers\PlaceController::class, 'show']);
    Route::put('place/{place}', [App\Http\Controllers\PlaceController::class, 'update']);
    Route::delete('place/{place}', [App\Http\Controllers\PlaceController::class, 'destroy']);


    Route::get('activities',[App\Http\Controllers\ActivityController::class, 'index'])->name('activities');
    Route::get('activities/create', [App\Http\Controllers\ActivityController::class, 'create']);
    Route::post('activities', [App\Http\Controllers\ActivityController::class, 'store']);
    Route::get('activities/{activity}/edit', [App\Http\Controllers\ActivityController::class, 'edit']);
    Route::get('activities/{activity}', [App\Http\Controllers\ActivityController::class, 'show']);
    Route::put('activities/{activity}', [App\Http\Controllers\ActivityController::class, 'update']);
    Route::delete('activities/{activity}', [App\Http\Controllers\ActivityController::class, 'destroy']);

    Route::post('userActivities', [App\Http\Controllers\ActivityController::class, 'addUserActivity']);
    Route::post('deleteUserActivities', [App\Http\Controllers\ActivityController::class, 'deleteUserActivity']);

    // Profil Kısmı
    Route::get('/profile/{id}',[App\Http\Controllers\UserController::class, 'seeProfile'])->name('seeProfile');



});  



















