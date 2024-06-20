<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductsController::class, 'allProducts']);
    // the endpoint is : http://127.0.0.1:8000/api/products

Route::get('/productsFlutter', [ProductsController::class, 'allProductsFlutter']);

Route::get('/categories', [CategoriesController::class, 'allCategories']);
    // the endpoint is : http://127.0.0.1:8000/api/categories

Route::get('/brands', [BrandsController::class, 'allBrands']);
    // the endpoint is : http://127.0.0.1:8000/api/brands

Route::apiResource('/message', MessagesController::class);
    // just use post the endpoint for add a new message is : http://127.0.0.1:8000/api/message

Route::get('/products/search', [ProductsController::class, 'searchProducts']);
    // just use get the endpoint for search a product in our database : http://127.0.0.1:8000/api/products/search

Route::apiResource('/clients', ClientsController::class);
    // the endpoint for add a new client using post method is : http://127.0.0.1:8000/api/clients

Route::get('/products/seven', [ProductsController::class, 'sevenProducts']);
    // these are the latest products will displayed in the home the seven products , the endpoint is : http://127.0.0.1:8000/api/products/seven

Route::get('/products/discount', [ProductsController::class, 'sevenProductsDiscount']);
    // these products will displayed in the home ,the seven products with discount ,the endpoint is : http://127.0.0.1:8000/api/products/discount

Route::apiResource('/orders', OrdersController::class);
    // the last endPoint which add the client the order and fill the pivot table , http://127.0.0.1:8000/api/orders
