<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

#####################################################
################    CRUD Brands    ##################
use App\Http\Controllers\BrandController;
Route::get('/adminBrands', [BrandController::class, 'index']);
Route::get('/addBrand', [BrandController::class, 'create']);
Route::post('/addBrand', [BrandController::class, 'store']);
Route::get('/modifyBrand/{id}', [BrandController::class, 'edit']);
Route::put('/modifyBrand', [BrandController::class, 'update']);
Route::get('/deleteBrand/{id}', [BrandController::class, 'confirmDelete']);
Route::delete('/deleteBrand', [BrandController::class, 'destroy']);

#########################################################
################    CRUD Categories    ##################
use App\Http\Controllers\CategoryController;
Route::get('/adminCategories', [CategoryController::class, 'index']);
Route::get('/addCategory', [CategoryController::class, 'create']);
Route::post('/addCategory', [CategoryController::class, 'store']);
Route::get('/modifyCategory/{id}', [CategoryController::class, 'edit']);
Route::put('/modifyCategory', [CategoryController::class, 'update']);
Route::get('/deleteCategory/{id}', [CategoryController::class, 'confirmDelete']);
Route::delete('/deleteCategory', [CategoryController::class, 'destroy']);

########################################################
#################    CRUD products    ##################
use App\Http\Controllers\ProductController;
Route::get('/adminProducts', [ProductController::class, 'index']);
Route::get('/addProduct', [ProductController::class, 'create']);
Route::post('/addProduct', [ProductController::class, 'store']);
Route::get('/modifyProduct/{id}', [ProductController::class, 'edit']);
Route::put('/modifyProduct', [ProductController::class, 'update']);
Route::get('/deleteProduct/{id}', [ProductController::class, 'confirmDelete']);
Route::delete('/deleteProduct', [ProductController::class, 'destroy']);
