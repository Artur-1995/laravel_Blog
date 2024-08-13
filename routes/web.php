<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Goods\GoodsController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Product\ProductsController;
use App\Http\Controllers\Product\ProductPageController;

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


Route::redirect('/', 'login');

Route::post('contact', 'Controller@send')->name('contact');

// Маршруты для работы с постами
Route::get('posts', [PostController::class, 'index'])->name('posts.index'); // Метод просмотра страницы списка постов
Route::get('post/{postId}', [PostController::class, 'show'])->name('post.show'); // Метод просмотра страницы поста
Route::get('posts/{postId}/like', [PostController::class, 'like'])->name('post.like');
Route::get('posts/{postId}/dislike', [PostController::class, 'dislike'])->name('post.dislike');
Route::get('orderby/popular', [PostController::class, 'popular'])->name('post.popular');
Route::get('orderby/created', [PostController::class, 'created'])->name('post.created');

// Пути для работы с комментариями
Route::get('comments/{postId}', [CommentController::class, 'index'])->name('comment.index'); // Метод просмотра комментариев
Route::get('posts/{postId}/comments/orderby/popular', [CommentController::class, 'popular'])->name('comment.popular'); // Метод сортировки комментариев по популярности
Route::get('posts/{postId}/comments/orderby/created', [CommentController::class, 'created'])->name('comment.created'); // Метод сортировки комментариев по дате создания
Route::get('posts/{postId}/comments/{commentId}/like', [CommentController::class, 'like'])->name('comment.like'); // Метод добавление лайков к комментарию
Route::get('posts/{postId}/comments/{commentId}/dislike', [CommentController::class, 'dislike'])->name('comment.dislike'); // Метод добавление дизлайков к комментарию

// Маршрут для создания пользователя
Route::get('register', [RegisterController::class, 'create'])->name('register.create'); // Метод просмотра страницы регистрации пользователя
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store'); // Метод регистрации пользователя

// Маршрут для авторизации пользователя
Route::get('login', [LoginController::class, 'index'])->name('login'); // Метод просмотра страницы авторизации
Route::post('login/auth', [LoginController::class, 'store'])->name('login.store'); // Метод авторизации пользователя
Route::get('login/login.logout', [LoginController::class, 'logout'])->name('login.logout'); // Метод разавторизации пользователя


// методы для Авторизованных пользователей
Route::middleware('auth')->prefix('user')->group(function () {
    // Маршруты для работы с товарами
    Route::get('goods', [GoodsController::class, 'index'])->name('goods.index'); // Метод просмотра страницы создания поста
    Route::get('products', ProductsController::class)->name('products'); // Метод просмотра страницы создания поста
    Route::get('products/{offer_id}/{product_id?}/{visibility?}', ProductPageController::class)->name('product.index'); // Метод просмотра страницы создания поста

    // Route::get('goods/create', [GoodsController::class, 'create'])->name('goods.create'); // Метод просмотра страницы создания поста
    // Route::post('goods/{user}/store', [GoodsController::class, 'store'])->name('goods.store'); // Метод создания постов
    // Route::get('goods/{goodsId}/edit', [GoodsController::class, 'edit'])->name('goods.edit'); // Метод просмотра страницы изменения постов
    // Route::post('goods/{goodsId}/update', [GoodsController::class, 'update'])->name('goods.update'); // Метод изменения постов
    // Route::get('goods/{goodsId}/delete', [GoodsController::class, 'delete'])->name('goods.delete'); // Метод удаления постов

    // Методы для получения токена
    Route::get('account', [UserController::class, 'index'])->name('account'); // Метод просмотра личного кабинета
    Route::get('getToken/{userId}', [UserController::class, 'store'])->name('getToken'); // Метод создания токена

    // Маршруты для работы с постами
    Route::get('post/create', [PostController::class, 'create'])->name('post.create'); // Метод просмотра страницы создания поста
    Route::post('post/{user}/store', [PostController::class, 'store'])->name('post.store'); // Метод создания постов
    Route::get('posts/{postId}/edit', [PostController::class, 'edit'])->name('post.edit'); // Метод просмотра страницы изменения постов
    Route::post('posts/{postId}/update', [PostController::class, 'update'])->name('post.update'); // Метод изменения постов
    Route::get('posts/{postId}/delete', [PostController::class, 'delete'])->name('post.delete'); // Метод удаления постов

    // Маршруты для работы с комментариями
    Route::get('posts/{postId}/comments/{commentId}/store', [CommentController::class, 'store'])->name('comment.store'); // Метод создания комментариев
});
