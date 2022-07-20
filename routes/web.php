<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VarietyController;
use App\Models\Fruit;
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

route::get('/', function() {
    $fruits = Fruit::orderBy('name')->with(['varieties' => function ($q) {
        $q->orderBy('name', 'asc')->with(['products' => function ($q) {
            $q->orderBy('name', 'asc');
        }]);
    }])->get();

    return view('welcome', ['fruits' => $fruits]);
});

Route::resource('fruits', FruitController::class);

Route::get('/fruits/{fruit}/varieties', [VarietyController::class, 'index'])->name('varieties.index');
Route::get('/varieties/{variety}', [VarietyController::class, 'edit'])->name('varieties.edit');
Route::post('/fruits/{fruit}/varieties', [VarietyController::class, 'store'])->name('varieties.store');
Route::patch('/variety/{variety}', [VarietyController::class, 'update'])->name('varieties.update');
Route::delete('/variety/{variety}', [VarietyController::class, 'destroy'])->name('varieties.destroy');

Route::get('/variety/{variety}/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/variety/{variety}/products', [ProductController::class, 'store'])->name('products.store');
Route::patch('/product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


