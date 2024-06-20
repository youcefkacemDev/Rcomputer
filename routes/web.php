<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\MessageConverter;

Route::post('/profile/edit', [AdminsController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');

Route::get('/profile/edit/{admin}', [AdminsController::class, 'edit'])
    ->name('profile.edit')
    ->middleware('auth');

Route::get('/profile', [AdminsController::class, 'show'])
    ->name("Profile")
    ->middleware('auth');

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/product', [ProductsController::class, 'index'])
    ->name('products')
    ->middleware('auth');

Route::get('/add-product', [ProductsController::class, 'create'])
    ->name('product-form')
    ->middleware('auth');

Route::post('/add-product', [ProductsController::class, 'store'])
    ->name('forms.addProduct')
    ->middleware('auth');

Route::get('/product/edit/{product}', [ProductsController::class, 'edit'])
    ->name('product.edit')
    ->middleware('auth');

Route::post('/product/update/{product}', [ProductsController::class, 'update'])
    ->name('product.update')
    ->middleware('auth');

Route::delete('/product/{product}', [ProductsController::class, 'destroy'])
    ->name('product.destroy')
    ->middleware('auth');

Route::get('/categories', [CategoriesController::class, 'index'])
    ->name('categories')
    ->middleware('auth');

Route::get('/add-category', [CategoriesController::class, 'create'])
    ->name('category-form')
    ->middleware('auth');

Route::post('/add-category', [CategoriesController::class, 'store'])
    ->name('forms.addCategory')
    ->middleware('auth');

Route::delete('/category/{category}', [CategoriesController::class, 'destroy'])
    ->name('category.destroy')
    ->middleware('auth');

Route::get('/category/edit/{category}', [CategoriesController::class, 'edit'])
    ->name('category.edit')
    ->middleware('auth');

Route::post('/category/update/{category}', [CategoriesController::class, 'update'])
    ->name('category.update')
    ->middleware('auth');

Route::get('/brand', [BrandsController::class, 'index'])
    ->name('brands')
    ->middleware('auth');

Route::get('/add-brand', [BrandsController::class, 'create'])
    ->name('brand-form')
    ->middleware('auth');


Route::post('/add-brand', [BrandsController::class, 'store'])
    ->name('forms.addBrand')
    ->middleware('auth');

Route::delete('/brand/{brand}', [BrandsController::class, 'destroy'])
    ->name('brand.destroy')
    ->middleware('auth');

Route::get('/brand/edit/{brand}', [BrandsController::class, 'edit'])
    ->name('brand.edit')
    ->middleware('auth');

Route::post('/brand/update/{brand}', [BrandsController::class, 'update'])
    ->name('brand.update')
    ->middleware('auth');

Route::get('messages', [MessagesController::class, 'index'])
    ->name('messages')
    ->middleware('auth');

Route::delete('/message/{message}', [MessagesController::class, 'destroy'])
    ->name('message.destroy')
    ->middleware('auth');

Route::get('message/{message}', [MessagesController::class, 'reply'])
    ->name('forms.reply')
    ->middleware('auth');

Route::post('message/{massager}', [MessagesController::class, 'mailReply'])
    ->name('reply')
    ->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clients', [ClientsController::class, 'index'])
    ->middleware('auth')
    ->name('clients');

Route::get('/orders', [OrdersController::class, 'index'])
    ->middleware('auth')
    ->name('orders');

Route::get('/order/information/{order}', [OrdersController::class, 'show'])
    ->middleware('auth')
    ->name('order.information');

Route::delete('/order/{order}', [OrdersController::class, 'destroy'])
    ->middleware('auth')
    ->name('order.destroy');
