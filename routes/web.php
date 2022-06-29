<?php

// use App\Models\Post;
// use App\Models\User;
use App\Models\Category;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
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

Route::get('/', function () {
    return view('home', [
        "title" => "home",
        "active" => 'home',
    ] );
    
});


Route::get('/esa', function() {
    return view('esa', [
        'title' => 'esa'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "Mahesa",
        "email" => "mahesaadi15@gmail.com",
        "image" => "hero.jpg",
        "active" => 'about',
    ]);
});

// KALO YANG INI MENGGUNAKAN CONTROLLER 
// RECOMEND MENGGUNAKAN CONTROLLER
Route::get('/posts', [PostController::class, 'index']);


// halaman sigle past 
Route::get('post/{post:slug}', [PostController::class, 'show']);

// INI VERSI WEB DI WPU
// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'categories' => Category::all()
//     ]);
// });

// versi categories di controller
Route::get('/categories', [CategoryController::class, 'index']);

// INI VERSI WEB DI WPU
// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('category', [
        // 'title' => $category->name,
        // 'posts' => $category->posts,
        // 'category' => $category->name
//     ]);
// });

// ROUTE GATEGORIES:SLUG DI CONTROLLER
Route::get('categories/{category:slug}', [CategoryController::class, 'show']);


// INI SAMA KAYAK DI BAWAH 
// Route::get('/authors/{user:username}', function(User $usaer) {
//     return view('posts', [
//         'title' => 'User Post',
//         'posts' => $user->posts,
        
//     ]);
// });


// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts', [
//   KATA LOAD ITU SAMA DENGAN WITH DI CONTROLLER DAN MODEL POST
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::POST('/login', [LoginController::class, 'authenticate']);
Route::POST('/logout', [LoginController::class, 'logout']);

// MIDDLEWARE GUEST ITU UNTUK YANG BELUM LOGIN ATAU TIDAK ADA AKUNNYA 
// DAN AUTH ITU UNTUK YANG SUDAH LOGIN DAN PUNYA AKUNNYA

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)
    ->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)
    ->middleware('admin');

