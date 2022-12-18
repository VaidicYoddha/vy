<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SptestController;
use App\Http\Controllers\Admin\ManuController;
use App\Http\Controllers\Admin\GranthController;
use App\Http\Controllers\Admin\ShankaController;
use App\Http\Controllers\Home\CommentController;
use App\Http\Controllers\Admin\Sp\SpchapterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// BLOG CONTROLLERS
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/sitemap', [HomeController::class, 'postlist']);
Route::get('/post/{post_slug}/{id}', [HomeController::class, 'singlepost']);
Route::get('/language/{slug}', [HomeController::class, 'langpost'])->name('language.slug');
Route::get('/category/{slug}', [HomeController::class, 'categorypost'])->name('category.slug');
Route::get('/tag/{slug}', [HomeController::class, 'tagpost'])->name('tag.slug');
Route::get('/search', [HomeController::class, 'search']);

Route::group(['middleware' => ['auth', 'isUser']], function() {

     Auth::routes(['verify'=> true]);
    Route::get('/author/{name}', [HomeController::class, 'authorprofile']);
    Route::get('/authors', [HomeController::class, 'authorslist']);

    //Comment
    Route::post('/comment', [CommentController::class, 'store'])->middleware(['auth','verified']);
    Route::post('/comment/reply', [CommentController::class, 'replystore'])->middleware(['auth','verified']);
    Route::get('/delete-comment/{comment_id}', [CommentController::class, 'destroy'])->middleware(['auth','verified']);

});

// SATYARTH PRAKASH

Route::get('/sptest', [SptestController::class, 'index']);


Route::get('/sp/{language}/{chapter}/{no}', [SpchapterController::class, 'chapterlist']);
Route::get('/sp', [SpchapterController::class, 'index']);
Route::get('/sp/search', [SpchapterController::class, 'search'])->name('sp.search');
// Route::get('/sp/{lang_Slug}', [SpchapterController::class, 'splanguage'])->name('splang.slug');
// Route::get('/sp/{language}/{Slug}/{no}', [SpchapterController::class, 'details'])->name('splang.no');

//Manusmruti BOOK

Route::get('/manusmriti', [ManuController::class, 'index'])->name('manusmriti');
Route::get('/manusmriti/{chapterno}/{shlokno}', [ManuController::class, 'details'])->name('manusmriti.details');
Route::get('/manusmriti/search', [ManuController::class, 'search'])->name('manusmriti.search');

//AARSH BOOK

Route::get('/granth', [GranthController::class, 'index'])->name('granth');
Route::get('/granth/search', [GranthController::class, 'search'])->name('granth.search');
Route::get('/granth/{language}/{chapter}/{no}', [GranthController::class, 'chapterlist']);
//Shanka Samadhan

Route::get('/shanka-samadhan', [ShankaController::class, 'index'])->name('shanka');
Route::get('/shanka-samadhan/search', [ShankaController::class, 'search'])->name('shanka.search');


//OTHTERS

   // require __DIR__.'/auth.php';




Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
